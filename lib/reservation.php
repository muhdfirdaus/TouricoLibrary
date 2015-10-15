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
class ReservationWS extends Hotel {


 protected $baseUrl;

 function __constructor($settings) {
  $this->baseUrl = $settings->testEnvironment == true ?
  "http://test.demo-reservationws.touricoholidays.com/ReservationService.svc?wsdl"
    :
  "http://demo-reservationws.touricoholidays.com/ReservationService.svc?wsdl"
    ;
 }
 
 function CancelReservations($params){
 
  $client = new soapClient($this->baseUrl);
  $result = $client ->CancelReservations($this->convertParamsIntoTouricoParams($params));
  return $this->returnCancelReservations($result);
 }
 
 function returnCancelReservations($touricoResult) {
 
  $link = $touricoResult->envelop;
 	$tc = 'true (Cancellation)';
	$fc = 'false (Cancellation) ';
  $CancelReservationResult =[
     
    'true (Cancellation)' => $link->CancelReservationResult->$tc,
    'false (Cancellation)' => $link->CancelReservationResult->$fc 
  ];
  
  return $CancelReservationResult;
 }
 
 function GetPreviousRG($params){
 
  $client = new soapClient($this->baseUrl);
  $result = $client ->GetPreviousRG($this->convertParamsIntoTouricoParams($params));
  return $this->returnGetPreviousRG($result);
 }
 
 function returnGetPreviousRG($touricoResult){
  
  $link = $touricoResult->envelop;
  
  $ResGroup = [

    'RGID' => $link->ResGroup->RGID,
    'isPackage' => $link->ResGroup->isPackage,
    'totalPrice' => $link->ResGroup->totalPrice,
    'currency' => $link->ResGroup->currency,
    'note' => $link->ResGroup->note,
    'dateCreated' => $link->ResGroup->dateCreated,
    'reservationCount' => $link->ResGroup->reservationCount
  ];  
  
  return $ResGroup;
 }
 
 function GetCancellationFee($params){
 
  $client = new soapClient($this->baseUrl);
  $result = $client ->GetCancellationFee($this->convertParamsIntoTouricoParams($params));
  return $this->returnGetCancellationFee($result);
 }
 
 function returnGetCancellationFee($touricoResult){
 
  $nResID = $link->nResID->nResID;
  $clxDate = $link->clxDate->clxDate;  
  return $nResID.$clxDate;
 }
 	function GetCancellationPolicies($params) {

  	$client = new SoapClient($this->baseUrl);
  	$result = $client->GetCancellationPolicies($this->convertParamsIntoTouricoParams($params));
  	return $this->returnGetCancellationPolicies($result);
	}

	function returnGetCancellationPolicies($touricoResult) {
		$link = $touricoResult->envelop;
  		$HotelPolicy = [
 		'hotelId' => $link->HotelPolicy->hotelId,
   		];
		$RoomTypePolicy = [
		'hotelRoomTypeId' => $link->RoomTypePolicy->hotelRoomTypeId,
   		'CheckIn' => $link->RoomTypePolicy->CheckIn,
   		'CheckOut' => $link->RoomTypePolicy->CheckOut
 		];
		$CancelPolicy = [
		'CancelPentalty' => $link->CancelPolicy->CancelPentalty
		];
		$Deadline = [
		'OffsetTimeUnit' => $link->Deadline->OffsetTimeUnit,
		'OffsetUnitMultiplier' => $link->Deadline->OffsetUnitMultiplier
		];
		$AmountPercent = [
		'BasicType' => $link->AmountPercent->BasicType,
		'Amount' => $link->AmountPercent->Amount
		];
		$CurrencyCode = $link->CurrencyCode;
		return $HotelPolicy.$RoomTypePolicy.$CancelPolicy.$Deadline.$AmountPercent.$CurrencyCode;
	}
		function GetRGInfo($params) {

  	$client = new SoapClient($this->baseUrl);
  	$result = $client->GetRGInfo($this->convertParamsIntoTouricoParams($params));
  	return $this->returnGetRGInfo($result);
	}

	function returnGetRGInfo($touricoResult) {
		$link = $touricoResult->envelop;
		$ResGroup = [
		'RGID' => $link->ResGroup->RGID,
		'isPackage' => $link->ResGroup->isPackage,
		'totalPrice' => $link->ResGroup->totalPrice,
		'currency' => $link->ResGroup->currency
		];
		$Reservation = [
		'reservationId' => $link->Reservation->reservationId,
		'fromDate' => $link->Reservation->fromDate,
		'toDate' => $link->Reservation->toDate,
		'totalTax' => $link->Reservation->totalTax,
		'price' => $link->Reservation->price,
		'currency' => $link->Reservation->currency,
		'status' => $link->Reservation->status,
		'numOfAdults' => $link->Reservation->numOfAdults,
		'numOfChildren' => $link->Reservation->numOfChildren,
		'note' => $link->Reservation->note,
		'tranNum' => $link->Reservation->tranNum
		];
		return $ResGroup.$Reservation;
	}
	function GetPreviousReservations($params) {

  	$client = new SoapClient($this->baseUrl);
  	$result = $client->GetPreviousReservations($this->convertParamsIntoTouricoParams($params));
  	return $this->returnGetPreviousReservations($result);
	}

	function returnGetPreviousReservations($touricoResult) {
		$link = $touricoResult->envelop;
		$ResGroup = [
		'rgid' => $link->ResGroup->rgid,
		'isPackage' => $link->ResGroup->isPackage
		];
		$Reservation = [
		'supplierId' => $link->Reservation->supplierId,
		'toDate' => $link->Reservation->toDate,
		'fromDate' => $link->Reservation->fromDate,
		'resId' => $link->Reservation->resId,
		'resStatus' => $link->Reservation->resStatus,
		'supplierName' => $link->Reservation->supplierName,
		'reservationDate' => $link->Reservation->reservationDate,
		'price' => $link->Reservation->price,
		'tax' => $link->Reservation->tax,
		'serviceType' => $link->Reservation->serviceType,
		'currency' => $link->Reservation->currency,
		'commissionPercent' => $link->Reservation->commissionPercent
		];
		$Passenger = [
		'isMainContact' => $link->Passenger->isMainContact,
		'type' => $link->Passenger->type,
		'firstName' => $link->Passenger->firstName,
		'middleName' => $link->Passenger->middleName,
		'lastName' => $link->Passenger->lastName
		];
		return $ResGroup.$Reservation.$Passenger;
	}

}

?>