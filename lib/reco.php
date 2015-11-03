<?php 

require_once 'vendor/autoload.php';
require_once 'lib/hotel.php';


class RecoWs extends Hotel {


	protected $baseUrl;

	function __constructor($settings) {
	$this->baseUrl = $settings->testEnvironment == true ? 
  	"http://test.demo-recows.touricoholidays.com/RecoSiteService.svc?wsdl"
	:
  	"http://demo-recows.touricoholidays.com/RecoSiteService.svc?wsdl"
	;
	}

	function GetInvoices($params) {

  	$client = new SoapClient($this->baseUrl);
  	$result = $client->GetInvoices($this->convertParamsIntoTouricoParams($params));
  	return $this->returnGetInvoices($result);
	}

	function returnGetInvoices($touricoResult) {
		$link = $touricoResult->envelop;
		$in = 'invoice number';
  		$Item = [
 		'invoice number' => $link->Item->$in
   		];
		return $Item;
	}
	function GetInvoicesDetails($params) {

  	$client = new SoapClient($this->baseUrl);
  	$result = $client->GetInvoicesDetails($this->convertParamsIntoTouricoParams($params));
  	return $this->returnGetInvoicesDetails($result);
	}

	function returnGetInvoicesDetails($touricoResult) {
		$link = $touricoResult->envelop;
		$cd = 'Creation Date';
  		$Invoice = [
 		'InvoiceNumber' => $link->Invoice->InvoiceNumber,
 		'RGID' => $link->Invoice->RGID,
 		'GuestName' => $link->Invoice->GuestName,
 		'SystemAmount' => $link->Invoice->SystemAmount,
 		'SystemCurrency' => $link->Invoice->SystemCurrency,
 		'LocalAmount' => $link->Invoice->LocalAmount,
 		'LocalCurrency' => $link->Invoice->LocalCurrency,
 		'Commission' => $link->Invoice->Commission,
 		'CommissionCurrency' => $link->Invoice->CommissionCurrency,
 		'Supplier' => $link->Invoice->Supplier,
 		'ReservationId' => $link->Invoice->ReservationId,
 		'GuestNum' => $link->Invoice->GuestNum,
 		'ServiceType' => $link->Invoice->SeviceType,
 		'Status' => $link->Invoice->Status,
 		'DocumentType' => $link->Invoice->DocumentType,
 		'DocumentState' => $link->Invoice->DocumentState,
 		'ServiceFromDate' => $link->Invoice->ServiceFromDate,
 		'ServiceToDate' => $link->Invoice->ServiceToDate,
 		'AgencyId' => $link->Invoice->AgencyId,
 		'AgencyName' => $link->Invoice->AgencyName,
 		'BookingAgent' => $link->Invoice->BookingAgent,
 		'AgentRefNumber' => $link->Invoice->AgentRefNumber,
 		'ReservationDate' => $link->Invoice->ReservationDate,
 		'DocumentPaymentDate' => $link->Invoice->DocumentPaymentDate,
 		'CreationDate' => $link->Invoice->$cd
   		];
		return $Invoice;
	}
	function GetReceipts($params){

 		$client = new soapClient($this->baseUrl);
 		$result = $client ->GetReceipts($this->convertParamsIntoTouricoParams($params));
		 return $this->returnGetReceipts($result);
		}

	function returnGetReceipts($touricoResult) {
 
 		$link = $touricoResult->envelop;
 		$rn = 'receipt number';
 		$item = [
   
   		'receipt number' => $link->item->$rn
 		]; 
 		return $item; 
	}

	function GetReceiptDetails($params){

 		$client = new soapClient($this->baseUrl);
 		$result = $client ->GetReceiptDetails($this->convertParamsIntoTouricoParams($params));
 	return $this->returnGetReceiptDetails($result);
	}

	function returnGetReceiptDetails($touricoResult) {
 
 		$link = $touricoResult->envelop;
 		$dt = 'Document Type';
 		$Receipt = [
   
  	 	'ReceiptNumber' => $link->Receipt->ReceiptNumber,
   		'Document Type' => $link->Receipt->$dt,
   		'SystemAmount' => $link->Receipt->SystemAmount,
   		'SystemCurrency' => $link->Receipt->SystemCurrency,
   		'LocalAmount' => $link->Receipt->LocalAmount,
   		'LocalCurrency' => $link->Receipt->LocalCurrency,
   		'AgencyId' => $link->Receipt->AgencyId,
   		'AgencyName' => $link->Receipt->AgencyName,
   		'PayerAddress' => $link->Receipt->PayerAddress,
   		'CreationDate' => $link->Receipt->CreationDate,
   		'CreatedDate' => $link->Receipt->CreatedDate
 		];
 
 	return $Receipt; 
	}

	function GetPrintedDocuments($params){

 		$client = new soapClient($this->baseUrl);
 		$result = $client ->GetPrintedDocuments($this->convertParamsIntoTouricoParams($params));
 		return $this->returnGetPrintedDocuments($result);
	}

	function returnGetPrintedDocument($touricoResult) {
 
 		$link = $touricoResult->envelop;
 
 		$PrintedDocument = $link->PrintedDocument;
 
 		return $PrintedDocument;
	}
	

}

?>