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

	function GetEmbarkationPortsByDestination($params) {

  	$client = new SoapClient($this->baseUrl);
  	$result = $client->GetEmbarkationPortsByDestination($this->convertParamsIntoTouricoParams($params));
  	return $this->returnGetEmbarkationPortsByDestination($result);
	}

	function returnGetEmbarkationPortsByDestination($touricoResult) {
		$link = $touricoResult->envelop;

		$Embarkation = [
 		'Destination/DestinationId' => $link->Destination/DestinationId,
 		'Port/Id' => $link->Port/Id,
 		'Port/Name' => $link->Port/Name
   		];
		return $Embarkation;
	}
	
	function GetPortsAll($params) {

  	$client = new SoapClient($this->baseUrl);
  	$result = $client->GetPortsAll($this->convertParamsIntoTouricoParams($params));
  	return $this->returnGetPortsAll($result);
	}

	function returnGetPortsAll($touricoResult) {
		$link = $touricoResult->envelop;

		$GetPortsAll = [
 		'Port/Id' => $link->Port/Id,
 		'Port/Name' => $link->Port/Name,
 		'Port/PortImg' => $link->Port/PortImg,
 		'Port/Description' => $link->Port/Description,
 		'Port/Latitude' => $link->Port/Latitude,
 		'Port/Longitude' => $link->Port/Longitude
   		];
		return $GetPortsAll;
	}
	
	function GetShipDetails($params) {

  	$client = new SoapClient($this->baseUrl);
  	$result = $client->GetShipDetails($this->convertParamsIntoTouricoParams($params));
  	return $this->returnGetShipDetails($result);
	}

	function returnGetShipDetails($touricoResult) {
		$link = $touricoResult->envelop;

		$Ship = [
 		'Ship/Id' => $link->Ship/Id,
 		'Ship/Name' => $link->Ship/Name,
 		'Ship/CruiseLineID' => $link->Ship/CruiseLineID,
 		'Ship/Img' => $link->Ship/Img,
 		'Ship/Description' => $link->Ship/Description,
 		'Ship/ShipRating' => $link->Ship/ShipRating,
 		'ShipImage/SmallImg' => $link->ShipImage/SmallImg,
 		'ShipImage/BigImg' => $link->ShipImage/BigImg
   		];
		$Amenity = [
 		'Amenity/Type' => $link->Amenity/Type,
 		'Amenity/Name' => $link->Amenity/Name
   		];
		$Deck = [
 		'Deck/Number' => $link->Deck/Number,
 		'Deck/Name' => $link->Deck/Name,
 		'Deck/Img' => $link->Deck/Img
   		];
		$DeckCategory = [
		'DeckCategory/DeckImg' => $link->DeckCategory/DeckImg,
 		'DeckCategory/CategoryCode' => $link->DeckCategory/CategoryCode
 		];
		$Public = [
		'PublicArea/Name' => $link->PublicArea/Name,
 		'PublicArea/Img' => $link->PublicArea/Img,
 		'PublicArea/DeckNumber' => $link->PublicArea/DeckNumber
 		];
		$ShipCabinCategory = [
		'ShipCabinCategory/CategoryCode' => $link->ShipCabinCategory/CategoryCode,
		'ShipCabinCategory/Name' => $link->ShipCabinCategory/Name,
 		'ShipCabinCategory/LargeImg' => $link->ShipCabinCategory/LargeImg,
 		'ShipCabinCategory/SmallImg' => $link->ShipCabinCategory/SmallImg,
 		'ShipCabinCategory/Description' => $link->ShipCabinCategory/Description
 		];
		return $Ship.$Amenity.$Deck.$DeckCategory.$Public.$ShipCabinCategory;
	}
	function SearchCruises($params) {

  	$client = new SoapClient($this->baseUrl);
  	$result = $client->SearchCruises($this->convertParamsIntoTouricoParams($params));
  	return $this->returnSearchCruises($result);
	}

	function returnSearchCruises($touricoResult) {
		$link = $touricoResult->envelop;

		$Cruise = [
 		'Cruise/CruiseLineID' => $link->Cruise/CruiseLineID,
 		'Cruise/CruiseLineName' => $link->Cruise/CruiseLineName,
 		'Cruise/CruiseLineLogo' => $link->Cruise/CruiseLineLogo,
 		'Cruise/ShipId' => $link->Cruise/ShipId,
 		'Cruise/ShipName' => $link->Cruise/ShipName,
 		'Cruise/ShipImg' => $link->Cruise/ShipImg,
 		'Cruise/CruiseLength' => $link->Cruise/CruiseLength,
 		'Cruise/TaxesIncluded' => $link->Cruise/TaxesIncluded,
 		'Cruise/Tax' => $link->Cruise/Tax,
 		'Cruise/Currency' => $link->Cruise/Currency,
 		'Cruise/DeparturePortID' => $link->Cruise/DeparturePortID,
 		'Cruise/ShipRating' => $link->Cruise/ShipRating,
 		'Cruise/DeparturePortName' => $link->Cruise/DeparturePortName
   		];
		$Itinerary = [
 		'Itinerary/IteneraryId' => $link->Itenerary/IteneraryId,
 		'Itenerary/Name' => $link->Itenerary/Name,
 		'Itenerary/MapImg' => $link->Itenerary/MapImg
   		];
		$Segment = [
 		'Segment/Order' => $link->Segment/Order,
 		'Segment/Day' => $link->Segment/Day,
 		'Segment/PortId' => $link->Segment/PortId,
 		'Segment/PortName' => $link->Segment/PortName,
 		'Segment/Arrival' => $link->Segment/Arrival,
 		'Segment/Departure' => $link->Segment/Departure
   		];
		$Sailing = [
		'Sailing/SailingID' => $link->Sailing/SailingID,
		'Sailing/IN_PricePublish' => $link->Sailing/IN_PublishPrice,
 		'Sailing/OV_PricePublish' => $link->Sailing/OV_PricePublish,
 		'Sailing/BL_PricePublish' => $link->Sailing/BL_PricePublish,
 		'Sailing/ST_PricePublish' => $link->Sailing/ST_PricePublish,
 		'Sailing/IN_Price' => $link->Sailing/IN_Price,
 		'Sailing/OV_Price' => $link->Sailing/OV_Price,
 		'Sailing/BL_Price' => $link->Sailing/BL_Price,
 		'Sailing/ST_Price' => $link->Sailing/ST_Price,
 		'Sailing/Departure' => $link->Sailing/Departure,
 		'Sailing/Arrival' => $link->Sailing/Arrival
 		];
		$Incentive = [
		'Incentive/Title' => $link->Incentive/Title,
 		'Incentive/Description' => $link->Incentive/Description
 		];
		return $Cruise.$Itenerary.$Segment.$Sailing.$Incentive;
	}
	function SelectCabin($params) {

  	$client = new SoapClient($this->baseUrl);
  	$result = $client->SelectCabin($this->convertParamsIntoTouricoParams($params));
  	return $this->returnSelectCabin($result);
	}

	function returnSelectCabin($touricoResult) {
		$link = $touricoResult->envelop;

		$Cabin= [
 		'Cabin/CabinNumber' => $link->Cabin/CabinNumber,
 		'Cabin/DeckName' => $link->Cabin/DeckName,
 		'Cabin/DeckNumber' => $link->Cabin/DeckNumber,
 		'Cabin/DeckImg' => $link->Cabin/DeckImg,
 		'Cabin/IsGuaranteed' => $link->Cabin/IsGuaranteed
   		];
		$DiningSeating = [
 		'DiningSeating/DiningCode' => $link->DiningSeating/DiningCode,
 		'DiningSeating/DiningName' => $link->DiningSeating/DiningName,
 		'DiningSeating/Status' => $link->DiningSeating/Status,
 		'DiningSeating/AdditionalPricePerPerson' => $link->DiningSeating/AdditionalPricePerPerson
   		];
		
		return $Cabin.$DiningSeating;
	}
	function SelectCabinCategory($params) {

  	$client = new SoapClient($this->baseUrl);
  	$result = $client->SelectCabinCategory($this->convertParamsIntoTouricoParams($params));
  	return $this->returnSelectCabinCategory($result);
	}

	function returnSelectCabinCategory($touricoResult) {
		$link = $touricoResult->envelop;

		$CabinCategory= [
 		'CabinCategory/Code' => $link->CabinCategory/Code,
 		'CabinCategory/Name' => $link->CabinCategory/Name,
 		'CabinCategory/Type' => $link->CabinCategory/Type,
 		'CabinCategory/Description' => $link->CabinCategory/Description,
 		'CabinCategory/DeckName' => $link->CabinCategory/DeckName,
 		'CabinCategory/Img' => $link->CabinCategory/Img,
 		'CabinCategory/IsGuaranteed' => $link->CabinCategory/IsGuaranteed
   		];
		$CabinCategoryPrice= [
 		'CabinCategoryPrice/PriceTitle' => $link->CabinCategoryPrice/PriceTitle,
 		'CabinCategoryPrice/TaxesIncluded' => $link->CabinCategoryPrice/TaxesIncluded,
 		'CabinCategoryPrice/PricePublish' => $link->CabinCategoryPrice/PricePublish,
 		'CabinCategoryPrice/Price' => $link->CabinCategoryPrice/Price,
 		'CabinCategoryPrice/UpgradeToCategoryCode' => $link->CabinCategoryPrice/UpgradeToCategoryCode,
 		'CabinCategoryPrice/ProductID' => $link->CabinCategoryPrice/ProductID,
 		'CabinCategoryPrice/NonRefundable' => $link->CabinCategoryPrice/NonRefundable,
 		'CabinCategoryPrice/Tax' => $link->CabinCategoryPrice/Tax,
 		'CabinCategoryPrice/NCF' => $link->CabinCategoryPrice/NCF
   		];
		$CLXPolicyText = $link->CLXPolicyText;
		$DiningSeating = [
 		'DiningSeating/DiningCode' => $link->DiningSeating/DiningCode,
 		'DiningSeating/DiningName' => $link->DiningSeating/DiningName,
 		'DiningSeating/Status' => $link->DiningSeating/Status,
 		'DiningSeating/AdditionalPricePerPerson' => $link->DiningSeating/AdditionalPricePerPerson
   		];
		
		return $CabinCategory.$CabinCategoryPrice.$CLXPolicyText.$DiningStation;
	}
}

?>