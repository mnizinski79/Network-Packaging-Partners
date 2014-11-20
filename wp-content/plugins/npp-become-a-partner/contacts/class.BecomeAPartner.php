<?php

class ContactForm{

	var $field_array; 
	var $goal; // goal object
	var $ytd_perf_data;
	var $ytd_actual;
	var $ytd_target;
	var $ytd_variance;
	var $eoy_target;
	var $eoy_variance;
	var $ptd_perf_data;

	function __construct(){
	
		$this->goal = $goal_obj;
		if (!is_null($fiscal_year_obj)){
			$this->fiscal_year = $fiscal_year_obj;
		} else {
			$this->fiscal_year = FiscalYear::getInstance();
		}

		$this->ytd_perf_data = $this->getPerfData();
                $this->ytd_actual = $this->calcYTD($this->ytd_perf_data, 'actual');
                $this->ytd_target = $this->calcYTD($this->ytd_perf_data, 'target');
                $this->ytd_variance = $this->calcVariance($this->ytd_actual, $this->ytd_target);
                $this->eoy_target = $this->getEOYTarget();
                $this->eoy_variance = $this->calcVariance($this->ytd_actual, $this->eoy_target);
                $this->status_percent = $this->getStatusPercent(); // percent complete, for the shaded bar on Track Performance page
                // get the plan-to-date values
                $this->ptd_perf_data = $this->getPerfData(true);
                $this->ptd_actual = $this->calcYTD($this->ptd_perf_data, 'actual');
                $this->ptd_target = $this->getEOYTarget(true); //$this->calcYTD($this->ptd_perf_data, 'target');
                $this->ptd_variance = $this->calcVariance($this->ptd_actual, $this->ptd_target);
                // get it all
                $this->all_perf_data = $this->getAllPerfData();
	}
}


?>