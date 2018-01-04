<?php
/**
 * Created by PhpStorm.
 * User: mbayeHann
 * Date: 18/11/2017
 * Time: 17:15
 */

namespace MyServiceBundle\Controller;


use FOS\RestBundle\Controller\FOSRestController;
use MyServiceBundle\Entity\Ville;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class VilleController extends FOSRestController
{
    /**
     * @Rest\Post("/ville/")
     */
    public function addVille(Request $request)
    {
        $designation=$request->get('designation');
        $ville=new Ville();
        $ville->setDesignation($designation);
        $em = $this->getDoctrine()->getManager();
        $em->persist($ville);
        $em->flush();
        return $ville;
    }

    /**
     * @Rest\Get("/villes")
     */
    public function getAllVille()
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceBundle:Ville')->findAll();
        return $restresult;
    }
	

	 public function getTailleFichier($fichier)
    {
	//	$phpExcelNouveau = $this->get('phpexcel')->createPHPExcelObject($fichier);
		$a=$fichier->getActiveSheet()->getRowIterator();
		$i=0;
		foreach($a as $row) {
				$cellI=$row->getCellIterator();
				$cellI->setIterateOnlyExistingCells(false);
				foreach ($cellI as $cell) {
					if(strcmp($cell->getColumn(),'A')==0) {
							if(strcmp($cell->getCalculatedValue(),'')==0){
								break;
							}
							else{
								$i+=1;
								break;
							}	 
						}
				}
		}
		return $i;
    }
	
	/**
     * @Rest\Get("/test")
     */
    public function getTest()
    {   
		/* Pour créer un nouveau fichier
			$phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();
			$writer = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel5');
			$writer->save('./file.xls');
		*/	
		
		/* Pour éditer fichier
			$phpExcelObject = $this->get('phpexcel')->createPHPExcelObject('file.xls');
				$phpExcelObject->getProperties()->setCreator("liuggio")
			   ->setLastModifiedBy("Giulio De Donato")
			   ->setTitle("Office 2005 XLSX Test Document")
			   ->setSubject("Office 2005 XLSX Test Document")
			   ->setDescription("Test document for Office 2005 XLSX, generated using PHP classes.")
			   ->setKeywords("office 2005 openxml php")
			   ->setCategory("Test result file");
		    $phpExcelObject->setActiveSheetIndex(0)
			   ->setCellValue('A1', 'Hello')
			   ->setCellValue('B2', 'world!');
		    $phpExcelObject->getActiveSheet()->setTitle('Simple');
		    // Set active sheet index to the first sheet, so Excel opens this as the first sheet
		    $phpExcelObject->setActiveSheetIndex(0);
			$writer = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel5');
			$writer->save('./file.xls');
		*/
		
			$phpExcelObject = $this->get('phpexcel')->createPHPExcelObject('Test.xls');
			$phpExcelNouveau = $this->get('phpexcel')->createPHPExcelObject('orange1.xls');
	
			$a=$phpExcelObject->getActiveSheet()->getRowIterator();
			$i=$this->getTailleFichier($phpExcelNouveau);
			foreach($a as $row) {
				$cellI=$row->getCellIterator();
				$cellI->setIterateOnlyExistingCells(false);
				$rowIndex = $row->getRowIndex ();
				
				foreach ($cellI as $cell) {
					 if($rowIndex >= 19){
						if(strcmp($cell->getColumn(),'A')==0) {
							if(strcmp($cell->getCalculatedValue(),'')==0){
								break;
							}
							else{
								$phpExcelNouveau->setActiveSheetIndex(0)
									->setCellValue($cell->getColumn().$i, $cell->getCalculatedValue());
							}	 
						}
						if(strcmp($cell->getColumn(),'B')==0) {
							 $phpExcelNouveau->setActiveSheetIndex(0)
						   ->setCellValue($cell->getColumn().$i, $cell->getCalculatedValue());
						}
						if(strcmp($cell->getColumn(),'C')==0) {
							 $phpExcelNouveau->setActiveSheetIndex(0)
						   ->setCellValue($cell->getColumn().$i, $cell->getCalculatedValue());
						}
						if(strcmp($cell->getColumn(),'D')==0) {
							 $phpExcelNouveau->setActiveSheetIndex(0)
						   ->setCellValue($cell->getColumn().$i, $cell->getCalculatedValue());
						}
						if(strcmp($cell->getColumn(),'E')==0) {
							 $phpExcelNouveau->setActiveSheetIndex(0)
						   ->setCellValue($cell->getColumn().$i, $cell->getCalculatedValue());
						}
						if(strcmp($cell->getColumn(),'F')==0) {
							 $phpExcelNouveau->setActiveSheetIndex(0)
						   ->setCellValue($cell->getColumn().$i, $cell->getCalculatedValue());
						}
						if(strcmp($cell->getColumn(),'G')==0) {
							 $phpExcelNouveau->setActiveSheetIndex(0)
						   ->setCellValue($cell->getColumn().$i, $cell->getCalculatedValue());
						}
						if(strcmp($cell->getColumn(),'H')==0) {
							 $phpExcelNouveau->setActiveSheetIndex(0)
						   ->setCellValue($cell->getColumn().$i, $cell->getCalculatedValue());
						}
						if(strcmp($cell->getColumn(),'I')==0) {
							 $phpExcelNouveau->setActiveSheetIndex(0)
						   ->setCellValue($cell->getColumn().$i, $cell->getCalculatedValue());
						}
						if(strcmp($cell->getColumn(),'J')==0) {
							 $phpExcelNouveau->setActiveSheetIndex(0)
						   ->setCellValue($cell->getColumn().$i, $cell->getCalculatedValue());
						}
						if(strcmp($cell->getColumn(),'K')==0) {
							 $phpExcelNouveau->setActiveSheetIndex(0)
						   ->setCellValue($cell->getColumn().$i, $cell->getCalculatedValue());
						}
						if(strcmp($cell->getColumn(),'L')==0) {
							 $phpExcelNouveau->setActiveSheetIndex(0)
						   ->setCellValue($cell->getColumn().$i, $cell->getCalculatedValue());
						}
						if(strcmp($cell->getColumn(),'M')==0) {
							 $phpExcelNouveau->setActiveSheetIndex(0)
						   ->setCellValue($cell->getColumn().$i, $cell->getCalculatedValue());
						}
						if(strcmp($cell->getColumn(),'N')==0) {
							 $phpExcelNouveau->setActiveSheetIndex(0)
						   ->setCellValue($cell->getColumn().$i, $cell->getCalculatedValue());
						}
						if(strcmp($cell->getColumn(),'O')==0) {
							 $phpExcelNouveau->setActiveSheetIndex(0)
						   ->setCellValue($cell->getColumn().$i, $cell->getCalculatedValue());
						}
						if(strcmp($cell->getColumn(),'P')==0) {
							 $phpExcelNouveau->setActiveSheetIndex(0)
						   ->setCellValue($cell->getColumn().$i, $cell->getCalculatedValue());
							$i+=1;
							break;
						}
					}					
				}			
			}
			$phpExcelNouveau->setActiveSheetIndex(0);
			$writer = $this->get('phpexcel')->createWriter($phpExcelNouveau, 'Excel5');
			$writer->save('./orange1.xls');
			var_dump($phpExcelNouveau);exit();
			
			
			
			// Parcourir fichier
		/*	$a=$phpExcelObject->getActiveSheet()->getRowIterator();
			foreach($a as $row) {
				$cellI=$row->getCellIterator();
				$cellI->setIterateOnlyExistingCells(false);
				$rowIndex = $row->getRowIndex ();
				 foreach ($cellI as $cell) {
					if($rowIndex==1) {
						var_dump($cell->getCalculatedValue());
					}
					if(strcmp($cell->getColumn(),'A')==0) {
						var_dump($rowIndex.'	'.$cell->getColumn().'	'.$cell->getCalculatedValue());
					}
					if(strcmp($cell->getColumn(),'B')==0) {
						var_dump($rowIndex.'	'.$cell->getColumn().'	'.$cell->getCalculatedValue());
					}
					if(strcmp($cell->getColumn(),'F')==0) {
						var_dump($rowIndex.'	'.$cell->getColumn().'	'.$cell->getCalculatedValue());
					}
					
					 
				}
				//var_dump($row->getCellIterator());exit();
			}*/
			var_dump('Liste');exit();
    }

    /**
     * @Rest\Get("/ville/{designation}")
     */
    public function getVilleByDesignation($designation)
    {
        $restresult = $this->getDoctrine()->getRepository('MyServiceBundle:Ville')->findOneBy(array ('designation' =>$designation));
        return $restresult;
    }

    /**
     * @Rest\Put("/ville/{idville}")
     */
    public function udpdateVile($idville,Request $request)
    {
        $designation=$request->get('designation');

        $sn = $this->getDoctrine()->getManager();
        $ville= $this->getDoctrine()->getRepository('MyServiceBundle:Ville')->find($idville);

        if(!empty($designation)){
            $ville->setDesignation($designation);
            $sn->flush();
        }

        return $ville;
    }


    /**
     *@Rest\Delete("/ville/{idville}")
     */
    public function deleteVille($idville)
    {
        $sn = $this->getDoctrine()->getManager();
        $ville = $this->getDoctrine()->getRepository('MyServiceBundle:Ville')->find($idville);

        if (empty($ville)) {
            return new View("Ville not found", Response::HTTP_NOT_FOUND);
        }
        else {
            $sn->remove($ville);
            $sn->flush();
        }
        return new View("Ville deleted successfully", Response::HTTP_OK);
    }
}