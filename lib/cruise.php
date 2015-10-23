<?php

require '../vendor/autoload.php';
class Settings {
	public $username;
	public $testEnvironment;
	/**
	 * In the array settings the "testEnvironment" is optional, being "false" the default value if it is not specified
	 */
	public function __constructor($settings) {
		$this->username = $settings["user"];
		$this->testEnvironment = isset($settings["testEnvironment"]) ? $settings["testEnvironment"] : false;
	}
}

class Cruise{
	
	protected $baseUrl;
	
	function __constructor($settings) {
		$this->baseUrl = $settings->testEnvironment == true ?
		" http://test.demo-cruisews.touricoholidays.com/CruiseServiceFlow.svc?wsdl"
				:
				" http://demo-cruisews.touricoholidays.com/CruiseServiceFlow.svc?wsdl"
						;
	}
	
	function BookCruise($params){
		$client = new soapClient($this->baseUrl);
		$result = $client -> BookCruise($this->convertParamsIntoTouricoParams($params));
		return $this->returnBookCruise($result);
	}
	
	function returnBookCruise($touricoResult){
		
		$link = $touricoResult->envelop;
		
		$RLId = $link->RLId->RLId;
		$ResId = $link->ResId->ResId;
		$IsAvailable = $link->IsAvailable->IsAvailable;
		
		return $RLId.$ResId.$IsAvailable;		
	}
	
	function CheckAvailabilityAndPrices($params){
		$client = new soapClient($this->baseUrl);
		$result = $client -> CheckAvailabilityAndPrices($this->convertParamsIntoTouricoParams($params));
		return $this->returnCheckAvailabilityAndPrices($result);
	}
	
	function returnCheckAvailabilityAndPrices($touricoResult){
		
		$link = $touricoResult->envelop;
		
		$CheckAvailabilityAndPrices = [
				
				'PriceBookingResponse/PublishPriceTotal' => $link->CheckAvailabilityAndPrices->PriceBookingResponse/PublishPriceTotal,
				'PriceBookingResponse/PriceTotal' => $link->CheckAvailabilityAndPrices->PriceBookingResponse/PriceTotal,
				'PriceBookingResponse/TaxesIncluded' => $link->CheckAvailabilityAndPrices->PriceBookingResponse/TaxesIncluded,
				'PriceBookingResponse/Tax' => $link->CheckAvailabilityAndPrices->PriceBookingResponse/Tax,
				'PriceBookingResponse/NCF' => $link->CheckAvailabilityAndPrices->PriceBookingResponse/NCF,
				'PriceBookingResponse/Currency' => $link->CheckAvailabilityAndPrices->PriceBookingResponse/Currency
		];		
		return $CheckAvailabilityAndPrices;		
	}
	
	function GetCancellationPolicies($params){
		$client = new soapClient($this->baseUrl);
		$result = $client -> GetCancellationPolicies($this->convertParamsIntoTouricoParams($params));
		return $this->returnGetCancellationPolicies($result);
	}
	
	function returnGetCancellationPolicies($touricoResult){
		
		$link = $touricoResult->envelop;
		
		$CLXPolicyText = $link->CLXPolicyText->CLXPolicyText;
		
		return $CLXPolicyText;
	}
	
	function GetCruiseDestinations($params){
		$client = new soapClient($this->baseUrl);
		$result = $client -> GetCruiseDestinations($this->convertParamsIntoTouricoParams($params));
		return $this->returnGetCruiseDestinations($result);
	}
	
	function returnGetCruiseDestinations($touricoResult){
		
		$link = $touricoResult->envelop;
		
		$GetCruiseDestinations = [
				
				'CruiseDestination/Id' => $link->GetCruiseDestinations->CruiseDestination/Id,
				'CruiseDestination/Name' => $link->GetCruiseDestinations->CruiseDestination/Name,
				'CruiseDestination/ParentId' => $link->GetCruiseDestinations->CruiseDestination/ParentId,
				'CruiseDestination/ParentName' => $link->GetCruiseDestinations->CruiseDestination/ParentName,
				'Image/BigImg' => $link->GetCruiseDestinations->Image/BigImg,
				'Image/SmallImg' => $link->GetCruiseDestinations->Image/SmallImg
		];		
		return $GetCruiseDestinations;		
	}
	
	function GetCruiseLines($params){
		$client = new soapClient($this->baseUrl);
		$result = $client -> GetCruiseLines($this->convertParamsIntoTouricoParams($params));
		return $this->returnGetCruiseLines($result);
	}
	
	function returnGetCruiseLines($touricoResult){
		
		$link = $touricoResult->envelop;
		
		$GetCruiseLines =[
				
				'CruiseLine/CruiseLineId' => $link->GetCruiseLines->CruiseLine/CruiseLineId,
				'CruiseLine/CruiseLineName' => $link->GetCruiseLines->CruiseLine/CruiseLineName,
				'Ship/ID' => $link->GetCruiseLines->Ship/ID,
				'Ship/Name' => $link->GetCruiseLines->Ship/Name
		];
		return $GetCruiseLines;
	}
	
	function GetDefinitions($params){
		$client = new soapClient($this->baseUrl);
		$result = $client -> GetDefinitions($this->convertParamsIntoTouricoParams($params));
		return $this->returnGetDefinitions($result);
	}
	
	function returnGetDefinitions($touricoResult){
	
	$link = $touricoResult->envelop;
	
	$AmenityTypeList =[
	
	'VALUE' => $link->AmenityTypeList->VALUE,
	'NAME' => $link->AmenityTypeList->NAME
	];
	
	$CruiseLinesConfiguration = [
			
			'ID' => $link->CruiseLinesConfiguration->ID,
			'NAME' => $link->CruiseLinesConfiguration->NAME,
			'ENABLEPASTPASSENGER' => $link->CruiseLinesConfiguration->ENABLEPASTPASSENGER,
			'MAXMINORAGE' => $link->CruiseLinesConfiguration->MAXMINORAGE,
			'MINGUARDIANAGE' => $link->CruiseLinesConfiguration->MINGUARDIANAGE,
			'NONBOARDINAGE' => $link->CruiseLinesConfiguration->NONBOARDINAGE,
			'PASSENGERAGEMANDATORY' => $link->CruiseLinesConfiguration->PASSENGERAGEMANDATORY,
			'MAXGUESTPERCABIN' => $link->CruiseLinesConfiguration->MAXGUESTPERCABIN
	];
	
	$CruiseMarketList = [
			
			'VALUE' => $link->CruiseMarketList->VALUE,
			'NAME' => $link->CruiseMarketList->NAME
	];
	
	$PassengerGenderList = [
				
			'VALUE' => $link->PassengerGenderList->VALUE,
			'NAME' => $link->PassengerGenderList->NAME
	];
	
	$PassengerTitlesList = [
			
			'VALUE' => $link->PassengerTitlesList->VALUE,
			'NAME' => $link->PassengerTitlesList->NAME
	];
	
	$PhonePrefixesList = [
			
			'VALUE' => $link->PhonePrefixesList->VALUE,
			'NAME' => $link->PhonePrefixesList->NAME
	];
	
	$ShipRatingList = [
			
			'VALUE' => $link->ShipRatingList->VALUE,
			'NAME' => $link->ShipRatingList->NAME
	];
	return $AmenityTypeList.$CruiseLinesConfiguration.$CruiseMarketList.$PassengerGenderList.$PassengerTitlesList.$PhonePrefixesList.$ShipRatingList;
	}
}

?>