<?php
function exportResume() {
	//http://www.ahowto.net/php/creating-ms-word-document-using-codeigniter-and-phpword
	require_once APPPATH."/third_party/PHPWord.php";
	//
	$CI = get_instance();
	$CI->load->library( 'word' );
	$section = $CI->word->createSection( array( 'orientation'=>'landscape' ) );
	$CI->load->model( 'resumemodel' );
	$resId = $CI->resumemodel->readByApplicantId( $applicantId )->row()->id;
	$aDetails = $CI->resumemodel->readDetails( $resId );
	//Styles.
	$CI->word->addFontStyle
	(
		'normalStyle',
		array
		(
			'name' => 'Verdana',
			'color' => '000000',
			'size' => 13
		)
	);
	$CI->word->addFontStyle
	(
		'headerStyle',
		array
		(
			'bold' => true,
			'italic' => true,
			'size' => 15
		)
	);
	$CI->word->addParagraphStyle
	(
		'paragraphStyle',
		array
		(
			'align' => 'center',
			'spaceAfter' => 100
		)
	);
	//Table.
	$styleTable = array( 'borderSize'=>0, 'borderColor'=>'000000', 'cellMargin'=>80 );
	$styleFirstRow = array( 'borderBottomSize'=>4, 'borderBottomColor'=>'000000', 'bgColor'=>'ffffff' );
	//Define cell style arrays.
	$styleCell = array( 'valign'=>'center' );
	$styleCellBTLR = array( 'valign'=>'center', 'textDirection' => PHPWord_Style_Cell::TEXT_DIR_BTLR );
	//Define font style for first row.
	$fontStyle = array( 'bold'=>true, 'align'=>'center' );
	//Add table style.
	$CI->word->addTableStyle( 'tableStyle', $styleTable, $styleFirstRow );
	//Add table.
	$table = $section->addTable( 'tableStyle' );
	//
	$width = 624;
	//
	//Basic details.
	$table->addRow();
	$table->addCell($width)->addText( 'Resume of ' . $aDetails['full_name'], 'headerStyle' );
	$table->addCell($width)->addImage
	(
		base_url( 'public/img/avatars/' ),
		array
		(
			'width'=>200,
			'height'=>200,
			'align'=>'center'
		)
	);
	$table->addRow();
	$table->addCell($width)->addText( $aDetails['headline'], 'normalStyle' );
	$table->addRow();
	$table->addCell($width)->addText( $aDetails['address'], 'normalStyle' );
	$table->addCell($width)->addText( $aDetails['city'], 'normalStyle' );
	$table->addCell($width)->addText( $aDetails['state'], 'normalStyle' );
	$table->addCell($width)->addText( $aDetails['country'], 'normalStyle' );
	$table->addCell($width)->addText( $aDetails['landline'], 'normalStyle' );
	$table->addCell($width)->addText( $aDetails['mobile'], 'normalStyle' );
	$table->addRow();
	$table->addCell($width)->addText( $aDetails['availability'], 'normalStyle' );
	$table->addCell($width)->addText( $aDetails['expected_salary'], 'normalStyle' );
	$table->addCell($width)->addText( $aDetails['current_industry'], 'normalStyle' );
	$table->addCell($width)->addText( $aDetails['qualification'], 'normalStyle' );
	$table->addRow();
	$table->addCell($width)->addText( $aDetails['summary'], 'normalStyle' );
	$table->addCell($width)->addTextBreak( 1 );
	//
	$section->addText( 'Work History', 'headerStyle' );
	foreach ( $aDeatils['work_histories'] as $w ) {
		$table->addRow();
		$table->addCell($width)->addText($w->position);
		$table->addCell($width)->addText($w->company);
		$table->addCell($width)->addText($w->from . ' - ' . $w->to);
		$table->addCell($width)->addText($w->location);
		$table->addCell($width)->addText($w->summary);
	}
	$table->addCell($width)->addTextBreak( 1 );
	//
	$table->addRow();
	$table->addCell($width)->addText( 'Education', 'headerStyle' );
	foreach ( $aDeatils['educations'] as $e ) {
		$table->addRow();
		$table->addCell($width)->addText($e->degree);
		$table->addCell($width)->addText($e->field_of_study);
		$table->addCell($width)->addText($e->school);
		$table->addCell($width)->addText($e->city . ', ' . $e->country);
		$table->addCell($width)->addText($e->from . ' - ' . $w->to);
	}
	$table->addCell($width)->addTextBreak( 1 );
	//
	$section->addText( 'Skills', 'headerStyle' );
	foreach ( $aDeatils['skills'] as $s ) {
		$table->addRow();
		$table->addCell($width)->addText($e->name);
	}
	$table->addCell($width)->addTextBreak( 1 );
	//
	$section->addText( 'Certifications', 'headerStyle' );
	foreach ( $aDeatils['certifications'] as $c ) {
		$table->addRow();
		$table->addCell($width)->addText($e->name);
	}
	$table->addCell($width)->addTextBreak( 1 );
	//
	$table->addCell($width)->addText( 'Additional Information', 'headerStyle' );
	$table->addCell($width)->addText( $aDeatils['additional_information'], 'normalStyle' );
	//
	$filename = 'Applicant_Resume_' . generateToken( $resId ) . '.docx';
	//MIME type.
	header( 'Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document' );
	//Tell browser what's the file name.
	header( 'Content-Disposition: attachment;filename="'.$filename.'"' );
	//No cache.
	header( 'Cache-Control: max-age=0' );
	$writer = PHPWord_IOFactory::createWriter( $CI->word, 'Word2007' );
	//
	$file = base_url( 'public/resumes/' . $filename );
	//$writer->save('php://output');
	$writer->save( $file );
	unlink( $file ).
	}
function exportAnalytics() {
	//Includes daily views, location, classification, etc.
	//TODO: Use Excel instead of MSWord using this class.
}
