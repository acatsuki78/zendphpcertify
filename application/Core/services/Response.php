<?php
class Core_Service_Response
{
	private $mapperResponse;

    public function saveResponse(Zend_Form $form, $idQuestion)
    {
    	$this->getMapperResponse()->save($this->toObject($form, $idQuestion));
    }
    
    public function toObject(Zend_Form $form, $idQuestion = null)
    {
    	$response = new Core_Model_Reponse();
    	
    	if (1 == count($form->getValues())) {
    		$response->setQuestion($idQuestion);
    		$response->setReponse(1);
    		$response->setResponseTexte($form->getValue('response'));
    	} else {
    		exit('SEGFAULT');
    		// Multiple response
    		$response->setQuestion($idQuestion);
    		$response->setReponse(1);
    		$response->setResponseTexte($form->getValue('response'));
    	}
    	
		
    	return $response;
    }
    
    public function getMapperResponse()
    {
    	if (null === $this->mapperResponse) {
    		$this->mapperResponse = new Core_Model_Mapper_Reponses();
    	}
    	
    	return $this->mapperResponse;
    }
}