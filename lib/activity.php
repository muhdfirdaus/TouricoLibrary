<?php 
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
 

class Activity {


	protected $baseUrl;

	function __constructor($settings) {
	$this->baseUrl = $settings->testEnvironment == true ? 
  	"http://test.demo-activityws.touricoholidays.com/ActivityBookFlow.svc?wsdl"
	:
  	"http://demo-activityws.touricoholidays.com/ActivityBookFlow.svc?wsdl"
	;
	}

	function SearchByActivityIds($params) {

  	$client = new SoapClient($this->baseUrl);
  	$result = $client->SearchByActivityIds($this->convertParamsIntoTouricoParams($params));
  	return $this->returnSearchByActivityIds($result);
	}

	function returnSearchByActivityIds($touricoResult) {
		$link = $touricoResult->envelop;
  		$Category = [
 		'categoryId' => $link->Category->categoryId,
 		'categroyName' => $link->Category->categoryName
   		];
		$Activity = [
		'description' => $link->Activity->description,
		'starsLevel' => $link->Activity->starsLevel,
		'activityId' => $link->Activity->activityId,
		'currency' => $link->Activity->currency,
		'maxChildAge' => $link->Activity->maxChildAge,
		'name' => $link->Activity->name,
		'provider' => $link->Activity->provider,
		'bestValue' => $link->Activity->bestValue,
		'minChildAge' => $link->Activity->minChildAge,
		'thumbURL' => $link->Activity->thumbURL
		];
		$Location = [
					
		'countryCode' => $link->Location->countryCode,
		'stateCode' => $link->Location->stateCode,
		'city' => $link->Location->city,
		'searchingState' => $link->Location->searchingState,	
		'searchingCity' => $link->Location->searchingCity,
		'location' => $link->Location->location,
		'address' => $link->Location->address,
		'longitude' => $link->Location->longitude,
		'latitude' => $link->Location->latitude
		];
		$ActivityOption = [
		'type' => $link->ActivityOption->type,	
		'typeDescription' => $link->ActivityOption->typeDescription,
		'optionId' => $link->ActivityOption->optionId,
		'name' => $link->ActivityOption->name
		];
		$Availability = [
		'fromDate' => $link->Availability->fromDate,
		'toDate' => $link->Availability->toDate,
		'maxAdults' => $link->Availability->maxAdults,
		'maxChildren' => $link->Availability->maxChildren,
		'maxUnits' => $link->Availability->maxUnits,
		'adultPrice' => $link->Availability->adultPrice,
		'childPrice' => $link->Availability->childPrice,
		'unitPrice' => $link->Availability->unitPrice
		];
		return $Category.$Activity.$Location.$ActivityOption.$Availability;
	}
	function SearchActivityByAirPortCode($params) {

  	$client = new SoapClient($this->baseUrl);
  	$result = $client->SearchActivityByAirPortCode($this->convertParamsIntoTouricoParams($params));
  	return $this->returnSearchActivityByAirPortCode($result);
	}

	function returnSearchActivityByAirPortCode($touricoResult) {
		$link = $touricoResult->envelop;
  		$Category = [
		'categoryId' => $link->Category->categoryId,
 		'categroyName' => $link->Category->categoryName
   		];
		$Activity = [
		'description' => $link->Activity->description,
		'starsLevel' => $link->Activity->starsLevel,
		'activityId' => $link->Activity->activityId,
		'currency' => $link->Activity->currency,
		'maxChildAge' => $link->Activity->maxChildAge,
		'name' => $link->Activity->name,
		'provider' => $link->Activity->provider,
		'bestValue' => $link->Activity->bestValue,
		'minChildAge' => $link->Activity->minChildAge,
		'thumbURL' => $link->Activity->thumbURL
		];
		$Location = [
					
		'countryCode' => $link->Location->countryCode,
		'stateCode' => $link->Location->stateCode,
		'city' => $link->Location->city,
		'searchingState' => $link->Location->searchingState,	
		'searchingCity' => $link->Location->searchingCity,
		'location' => $link->Location->location,
		'address' => $link->Location->address,
		'longitude' => $link->Location->longitude,
		'latitude' => $link->Location->latitude
		];
		$ActivityOption = [
		'type' => $link->ActivityOption->type,	
		'typeDescription' => $link->ActivityOption->typeDescription,
		'optionId' => $link->ActivityOption->optionId,
		'name' => $link->ActivityOption->name
		];
		$Availability = [
		'fromDate' => $link->Availability->fromDate,
		'toDate' => $link->Availability->toDate,
		'maxAdults' => $link->Availability->maxAdults,
		'maxChildren' => $link->Availability->maxChildren,
		'maxUnits' => $link->Availability->maxUnits,
		'adultPrice' => $link->Availability->adultPrice,
		'childPrice' => $link->Availability->childPrice,
		'unitPrice' => $link->Availability->unitPrice
		];
		return $Category.$Activity.$Location.$ActivityOption.$Availability;
	}
	function SearchActivityByDestinationID($params) {

  	$client = new SoapClient($this->baseUrl);
  	$result = $client->SearchActivityByDestinationID($this->convertParamsIntoTouricoParams($params));
  	return $this->returnSearchActivityByDestinationID($result);
	}

	function returnSearchActivityByDestinationID($touricoResult) {
		$link = $touricoResult->envelop;
  		$Category = [
		'categoryId' => $link->Category->categoryId,
 		'categroyName' => $link->Category->categoryName
   		];
		$Activity = [
		'description' => $link->Activity->description,
		'starsLevel' => $link->Activity->starsLevel,
		'activityId' => $link->Activity->activityId,
		'currency' => $link->Activity->currency,
		'maxChildAge' => $link->Activity->maxChildAge,
		'name' => $link->Activity->name,
		'provider' => $link->Activity->provider,
		'bestValue' => $link->Activity->bestValue,
		'minChildAge' => $link->Activity->minChildAge,
		'thumbURL' => $link->Activity->thumbURL
		];
		$Location = [
					
		'countryCode' => $link->Location->countryCode,
		'stateCode' => $link->Location->stateCode,
		'city' => $link->Location->city,
		'searchingState' => $link->Location->searchingState,	
		'searchingCity' => $link->Location->searchingCity,
		'location' => $link->Location->location,
		'address' => $link->Location->address,
		'longitude' => $link->Location->longitude,
		'latitude' => $link->Location->latitude
		];
		$ActivityOption = [
		'type' => $link->ActivityOption->type,	
		'typeDescription' => $link->ActivityOption->typeDescription,
		'optionId' => $link->ActivityOption->optionId,
		'name' => $link->ActivityOption->name
		];
		$Availability = [
		'fromDate' => $link->Availability->fromDate,
		'toDate' => $link->Availability->toDate,
		'maxAdults' => $link->Availability->maxAdults,
		'maxChildren' => $link->Availability->maxChildren,
		'maxUnits' => $link->Availability->maxUnits,
		'adultPrice' => $link->Availability->adultPrice,
		'childPrice' => $link->Availability->childPrice,
		'unitPrice' => $link->Availability->unitPrice
		];
		return $Category.$Activity.$Location.$ActivityOption.$Availability;
	}
	function GetActivityDetails($params) {

  	$client = new SoapClient($this->baseUrl);
  	$result = $client->GetActivityDetails($this->convertParamsIntoTouricoParams($params));
  	return $this->returnGetActivityDetails($result);
	}

	function returnGetActivityDetails($touricoResult) {
		$link = $touricoResult->envelop;
  		$ActivityDetails = [
		'activityPhone' => $link->ActivityDetails->activityPhone,
		'starsLevel' => $link->ActivityDetails->starsLevel,
		'activityId' => $link->ActivityDetails->activityId,
		'name' => $link->ActivityDetails->name,
		'categoryName' => $link->ActivityDetails->categoryName];
		
		$Location = [
					
		'countryCode' => $link->Location->countryCode,
		'stateCode' => $link->Location->stateCode,
		'city' => $link->Location->city,
		'searchingState' => $link->Location->searchingState,	
		'searchingCity' => $link->Location->searchingCity,
		'location' => $link->Location->location,
		'address' => $link->Location->address,
		'longitude' => $link->Location->longitude,
		'latitude' => $link->Location->latitude
		];
		$ShortDescription = $link->ShortDescription->desc;
		$LongDescription = $link->LongDescription->desc;
		$Images = $link->Images->image;
		$Movies = [
		'youtubeId' => $link->Movies->youtubeId,
		'title' => $link->Movies->title
		];
		return $ActivityDetails.$Location.$ShortDescription.$LongDescription.$Images.$Movies;
	}



}
?>