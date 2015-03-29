<?php
	function exportResume( $applicantId ) {
		/*
			http://phpword.readthedocs.org/en/latest/general.html (Working acommpanied by http://stackoverflow.com/questions/26030924/codeigniter-phpword-using-as-third-party)
			https://phpword.codeplex.com/documentation (Not tested.)
			http://www.ahowto.net/php/creating-ms-word-document-using-codeigniter-and-phpword
		*/
		$CI = get_instance();
		$CI->load->library( 'word' );
		$section = $CI->word->createSection( array( 'orientation'=>'landscape' ) );
		$CI->load->model( 'resumemodel' );
		$result = $CI->resumemodel->readByApplicantId( $applicantId );
		$resume = $result['resume'];
		$resId = $resume->resume_id;
		//Styles.
		$CI->word->addFontStyle
		(
			'normalStyle',
			array( 'name' => 'Arial', 'color' => '000000', 'size' => 9 )
		);
		$CI->word->addFontStyle
		(
			'resumeTitleStyle',
			array( 'bold' => true, 'italic' => false, 'size' => 27 )
		);
		$CI->word->addFontStyle
		(
			'headerStyle',
			array( 'bold' => true, 'italic' => false, 'size' => 12 )
		);
		$CI->word->addParagraphStyle
		(
			'paragraphStyle',
			array( 'align' => 'center', 'spaceAfter' => 100 )
		);
		//Table.
		//BUG: borderSize not working. Changing borderColor to ffffff instead.
		$styleTable = array( 'borderSize'=>0, 'borderColor'=>'000000', 'cellMargin'=>80 );
		$styleFirstRow = array( 'borderBottomSize'=>4, 'borderBottomColor'=>'000000', 'bgColor'=>'ffffff' );
		//Define cell style arrays.
		$styleCell = array( 'valign'=>'center' );
		$styleCellBTLR = array( 'valign'=>'center', 'textDirection' => 'btLr'/*PHPWord_Style_Cell::TEXT_DIR_BTLR*/ );
		//Define font style for first row.
		$fontStyle = array( 'bold'=>true, 'align'=>'center' );
		//Add table style.
		$CI->word->addTableStyle( 'tableStyle', $styleTable, $styleFirstRow );
		//Add table.
		$table = $section->addTable( 'tableStyle' );
		//A4 paper size in PX.
		$ppw = PhpOffice\PhpWord\Shared\Converter::pixelToTwip(595);
		$pph = PhpOffice\PhpWord\Shared\Converter::pixelToTwip(842);
		//
		$width = 624;
		//
		//Basic details.
		$table->addRow();
		$table->addCell( $width )->addText( 'Resume of ' . $resume->full_name, 'resumeTitleStyle' );
		$table->addCell( $width, array('align' => 'right') )->addImage
		(
			base_url( 'public/uploads/' . $resume->image_path ),
			array('width' => 100, 'height' => 100)
		);
		$table->addRow();
		$table->addCell( $ppw, array('gridSpan' => 2) )->addText( $resume->headline, 'normalStyle' );
		$table->addRow();
		$table->addCell( $width, array('gridSpan' => 2) )->addText( $resume->address, 'normalStyle' );
		$table->addRow();
		$table->addCell( $width )->addText( $resume->city, 'normalStyle' );
		$table->addCell( $width )->addText( $resume->state, 'normalStyle' );
		$table->addRow();
		$table->addCell( $width )->addText( $resume->country, 'normalStyle' );
		$table->addCell( $width )->addText( $resume->landline, 'normalStyle' );
		$table->addRow();
		$table->addCell( $width )->addText( $resume->mobile, 'normalStyle' );
		$table->addCell( $width )->addText( $resume->availability, 'normalStyle' );
		$table->addRow();
		$table->addCell( $width )->addText( $resume->expected_salary, 'normalStyle' );
		$table->addCell( $width )->addText( $resume->current_position_title, 'normalStyle' );
		$table->addRow();
		$table->addCell( $width )->addText( $resume->qualification, 'normalStyle' );
		$table->addCell( $width )->addText( $resume->summary, 'normalStyle' );
		$table->addCell( $width )->addTextBreak( 1 );
		//
		$section->addText( 'Work History', 'headerStyle' );
		foreach ( $result['workHistories'] as $w ) {
			$table->addRow();
			$table->addCell( $width )->addText( $w->position );
			$table->addCell( $width )->addText( $w->company );
			$table->addCell( $width )->addText( $w->date_from . ' - ' . $w->date_to );
			$table->addCell( $width )->addText( $w->location );
			$table->addCell( $width )->addText( $w->summary );
		}
		$table->addCell( $width )->addTextBreak( 1 );
		//
		$table->addRow();
		$table->addCell( $width )->addText( 'Education', 'headerStyle' );
		foreach ( $result['educations'] as $e ) {
			$table->addRow();
			$table->addCell( $width )->addText( $e->degree );
			$table->addCell( $width )->addText( $e->field_of_study );
			$table->addCell( $width )->addText( $e->school );
			$table->addCell( $width )->addText( $e->city . ', ' . $e->country );
			$table->addCell( $width )->addText( $e->date_from . ' - ' . $w->date_to );
		}
		$table->addCell( $width )->addTextBreak( 1 );
		//
		$section->addText( 'Skills', 'headerStyle' );
		foreach ( $result['skills'] as $s ) {
			$table->addRow();
			$table->addCell( $width )->addText( $s->name );
		}
		$table->addCell( $width )->addTextBreak( 1 );
		//
		$section->addText( 'Certifications', 'headerStyle' );
		foreach ( $result['certifications'] as $c ) {
			$table->addRow();
			$table->addCell( $width )->addText( $c->name );
		}
		$table->addCell( $width )->addTextBreak( 1 );
		//
		$table->addCell( $width )->addText( 'Additional Information', 'headerStyle' );
		$table->addCell( $width )->addText( $result['additionalInformations'], 'normalStyle' );
		//
		$filename = 'Applicant_Resume_' . $resId . rand( 0, $resId );
		$filename .= generateToken( $filename ) . '.docx';
		//MIME type.
		header( 'Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document' );
		//Tell browser what's the file name.
		header( 'Content-Disposition: attachment;filename="'.$filename.'"' );
		//No cache.
		header( 'Cache-Control: max-age=0' );
		$writer = \PhpOffice\PhpWord\IOFactory::createWriter( $CI->word, 'Word2007' );
		//
		$file = base_url( 'public/resumes/' . $filename );
		//Automatically download file.
		$writer->save( 'php://output' );
		//Or, save file to server.
		//$writer->save( $file );
		//unlink( $file ).
	}