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
			array( 'name' => 'Verdana', 'color' => '000000', 'size' => 9 )
		);
		$CI->word->addFontStyle
		(
			'resumeTitleStyle',
			array( 'name' => 'Arial', 'bold' => true, 'italic' => false, 'size' => 27 )
		);
		$CI->word->addFontStyle
		(
			'headerStyle',
			array( 'name' => 'Arial', 'bold' => true, 'italic' => false, 'size' => 12 )
		);
		$CI->word->addParagraphStyle
		(
			'paragraphStyle',
			array( 'align' => 'center', 'spaceAfter' => 100 )
		);
		//TODO: Bullets...
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
		$ppw = PhpOffice\PhpWord\Shared\Converter::inchToTwip(8.5);
		$pph = PhpOffice\PhpWord\Shared\Converter::inchToTwip(11);
		//
		$width = 624;
		//
		//Basic details.
		$table->addRow();
		$table->addCell( $ppw )->addText( 'Resume of ' . $resume->full_name, 'resumeTitleStyle' );
		$table->addCell( $ppw )->addText( '', 'normalStyle' );
		$table->addCell( 100, array('align' => 'right') )->addImage
		(
			base_url( 'public/uploads/' . $resume->image_path ),
			array('width' => 100, 'height' => 100)
		);
		$table->addRow();
		$table->addCell( $ppw, array('gridSpan' => 3) )->addText( 'Headline: ' .  $resume->headline, 'normalStyle' );
		$table->addRow();
		$table->addCell( $width, array('gridSpan' => 3) )->addText( 'Address: ' . $resume->address, 'normalStyle' );
		$table->addRow();
		$table->addCell( $width )->addText( 'City: ' . $resume->city, 'normalStyle' );
		$table->addCell( $width, array('gridSpan' => 2) )->addText( 'State: ' . $resume->state, 'normalStyle' );
		$table->addRow();
		$table->addCell( $width )->addText( 'Country: ' . $resume->country, 'normalStyle' );
		$table->addCell( $width, array('gridSpan' => 2) )->addText( 'Landline: ' . $resume->landline, 'normalStyle' );
		$table->addRow();
		$table->addCell( $width )->addText( 'Mobile: ' . $resume->mobile, 'normalStyle' );
		$table->addCell( $width, array('gridSpan' => 2) )->addText( 'Availability: ' . $resume->availability, 'normalStyle' );
		$table->addRow();
		$table->addCell( $width )->addText( 'Expected Salary: ' . $resume->expected_salary, 'normalStyle' );
		$table->addCell( $width, array('gridSpan' => 2) )->addText( 'Job Title: ' . $resume->current_position_title, 'normalStyle' );
		$table->addRow();
		$table->addCell( $width )->addText( 'Qualification: ' . $resume->qualification, 'normalStyle' );
		$table->addCell( $width, array('gridSpan' => 2) )->addText( 'Summary: ' . $resume->summary, 'normalStyle' );
		//
		$table->addrow();
		$table->addCell( $width, array('gridSpan' => 3) )->addText( '', 'normalStyle' );
		
		$table->addRow();
		$table->addCell($ppw, array('gridSpan' => 3))->addText( 'Work History', 'headerStyle' );
		foreach ( $result['workHistories'] as $w ) {
			$table->addRow();
			$table->addCell( $width )->addText( 'Position: ' . $w->position );
			$table->addCell( $width, array('gridSpan' => 2) )->addText( 'Company: ' . $w->company );
			$table->addRow();
			$table->addCell( $width )->addText
			( 
				'From: ' . toHumanReadableDate($w->date_from) . ' - ' . 
				'To: ' . toHumanReadableDate($w->date_to) 
			);
			$table->addCell( $width, array('gridSpan' => 2) )->addText( 'Location: ' . $w->location );
			$table->addRow();
			$table->addCell( $ppw, array('gridSpan' => 3) )->addText( 'Summary: ' . $w->summary );
		}
		$table->addrow();
		$table->addCell( $width, array('gridSpan' => 3) )->addText( '', 'normalStyle' );
		//
		$table->addRow();
		$table->addCell( $ppw, array('gridSpan' => 3) )->addText( 'Education', 'headerStyle' );
		foreach ( $result['educations'] as $e ) {
			$table->addRow();
			$table->addCell( $width )->addText( 'Degree: ' . $e->degree );
			$table->addCell( $width, array('gridSpan' => 2) )->addText( 'Field Of Study: ' . $e->field_of_study );
			$table->addRow();
			$table->addCell( $width )->addText( 'School: ' . $e->school );
			$table->addCell( $width, array('gridSpan' => 2) )->addText( 'Location: ' . $e->city . ', ' . $e->country );
			$table->addRow();
			$table->addCell( $width )->addText
			( 
				'From: ' . toHumanReadableDate($e->date_from) . ' - ' . 
				'To: ' . toHumanReadableDate($w->date_to) 
			);
		}
		$table->addrow();
		$table->addCell( $width, array('gridSpan' => 3) )->addText( '', 'normalStyle' );
		//
		$table->addRow();
		$table->addCell($ppw, array('gridSpan' => 3))->addText( 'Skills', 'headerStyle' );
		foreach ( $result['skills'] as $s ) {
			$table->addRow();
			$table->addCell( $width, array('gridSpan' => 3) )->addText( $s->name );
		}
		$table->addrow();
		$table->addCell( $width, array('gridSpan' => 3) )->addText( '', 'normalStyle' );
		//
		$table->addRow();
		$table->addCell($ppw, array('gridSpan' => 3))->addText( 'Certifications', 'headerStyle' );
		foreach ( $result['certifications'] as $c ) {
			$table->addRow();
			$table->addCell( $width, array('gridSpan' => 3) )->addText( $c->name );
		}
		$table->addrow();
		$table->addCell( $width, array('gridSpan' => 3) )->addText( '', 'normalStyle' );
		//
		$table->addRow();
		$table->addCell( $ppw, array('gridSpan' => 3) )->addText( 'Additional Information', 'headerStyle' );
		$table->addRow();
		$table->addCell( $ppw, array('gridSpan' => 3) )->addText( $result['additionalInformations'], 'normalStyle' );
		//
		$filename = 'Resume of ' . $resume->full_name . ' ' . $resId . rand( 0, $resId );
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