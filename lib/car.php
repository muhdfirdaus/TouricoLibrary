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
 

class Car{

 protected $baseUrl;

 function __constructor($settings) {
 $this->baseUrl = $settings->testEnvironment == true ? 
   "http://test.demo-carws.touricoholidays.com/CarWebService.svc?wsdl"
 :
   "http://demo-carws.touricoholidays.com/CarWebService.svc?wsdl"
 ;
 }
 
 function SearchCars($params)
 {
  $client = new soapClient($this->baseUrl);
  $result = $client -> SearchCars($this->convertParamsIntoTouricoParams($params));
  return $this->returnSearchCars($result);
 }
 
 function returnSearchCars($touricoResult)
 {
  $link = $touricoResult->envelop;
 
  $d = 'date';
  $SearchParameters = [
  
   'id'   => $link->SearchParameters->id,
   'date' => $link->SearchParameters->$d,
   'hour' => $link->SearchParameters->hour
  ];
  
  $CarResults = [
   
   'Car' => $link->CarResults->Car,
  ];
  
  
  $tc = 'type (Car)';
  $cc = 'currency (Car)';
  $sc = 'status (Car)';
  $pc = 'productId (Car)';
  $Car = [
  
   'carCompanyId' => $link->SearchParameters->carCompanyId,
   'carCompanyName' => $link->SearchParameters->carCompanyName,
   'carName' => $link->SearchParameters->carName,
   'carId' => $link->SearchParameters->idcarId,
   'adapterCode' => $link->SearchParameters->adapterCode,
   'carThummb' => $link->SearchParameters->carThummb,
   'class' => $link->SearchParameters->class,
   'trammision' => $link->SearchParameters->trammision,
   'ac' => $link->SearchParameters->ac,
   'type(Car)' => $link->SearchParameters->$tc,
   'maxPassengers' => $link->SearchParameters->maxPassengers,
   'doors' => $link->SearchParameters->doors,
   'luggageLarge' => $link->SearchParameters->luggageLarge,
   'luggageSmall' => $link->SearchParameters->luggageSmall,
   'currency(Car)' => $link->SearchParameters->$cc,
   'status(Car)' => $link->SearchParameters->$sc,
   'productId(Car)' => $link->SearchParameters->$pc,
   'minAvgPrice' => $link->SearchParameters->minAvgPrice,
   'minPrice' => $link->SearchParameters->minPrice
  ];
  
  $RouteStations = [
  
   'Stations' => $link->RouteStations->Stations,
  ];
  
  $ic ='id (CarStation)';
  $nc = 'name (CarStation)';
  $ac = 'address (CarStation)';
  $CarStation = [
  
   'id(CarStation)' => $link->CarStation->$ic,
   'name(CarStation)' => $link->CarStation->$nc,
   'address(CarStation)' => $link->CarStation->$ac,
   'phone' => $link->CarStation->phone,
   'operationHoursPickup' => $link->CarStation->operationHoursPickup,
   'operationHoursDropOff' => $link->CarStation->operationHoursDropOff,
   'minPrice' => $link->CarStation->minPrice
  ];
  
  return $SearchParameters.$CarResults.$Car.$RouteStations.$CarStation;
   
 }
}
  
 ?>