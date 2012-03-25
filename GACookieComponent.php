<?php

class GACookieComponent extends Component {

	var $campaign_source = "";    	// Campaign Source
	var $campaign_name = "";  		// Campaign Name
	var $campaign_medium = "";    	// Campaign Medium
	var $campaign_content = "";   	// Campaign Content
	var $campaign_term = "";      	// Campaign Term

	var $first_visit = "";      	// Date of first visit
	var $previous_visit = "";		// Date of previous visit
	var $current_visit_started = "";	// Current visit started at
	var $times_visited = "";		// Times visited

	  
	public function parse() {
		$this->utmz = $_COOKIE["__utmz"];
		$this->utma = $_COOKIE["__utma"];

		if (strlen($this->utmz) > 0) {

			// Parse __utmz cookie
			list($domain_hash,$timestamp, $session_number, $campaign_numer, $campaign_data) = split('[\.]', $this->utmz, 5);

			// Parse the campaign data
			$campaign_data = parse_str(strtr($campaign_data, "|", "&"));

			$this->campaign_source = $utmcsr;
			$this->campaign_name = $utmccn;
			$this->campaign_medium = $utmcmd;
			if (isset($utmctr)) $this->campaign_term = $utmctr;
			if (isset($utmcct)) $this->campaign_content = $utmcct;

			// You should tag you campaigns manually to have a full view
			// of your adwords campaigns data. 
			// The same happens with Urchin, tag manually to have your campaign data parsed properly.
			if (isset($utmgclid)) {
				$this->campaign_source = "google";
				$this->campaign_name = "";
				$this->campaign_medium = "cpc";
				$this->campaign_content = "";
				$this->campaign_term = $utmctr;
			}

		}

		if (strlen($this->utma) > 0) {

			// Parse the __utma Cookie
			list($domain_hash,$random_id,$time_initial_visit,$time_beginning_previous_visit,$time_beginning_current_visit,$session_counter) = split('[\.]', $this->utma, 6);

			$this->first_visit = date("d M Y - H:i",$time_initial_visit);
			$this->previous_visit = date("d M Y - H:i",$time_beginning_previous_visit);
			$this->current_visit_started = date("d M Y - H:i",$time_beginning_current_visit);
			$this->times_visited = $session_counter;
		}
	}  
}
