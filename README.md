# Google Analytics Cookie Parser for CakePHP

Extracts all the relevant information out of the GA cookies and makes it available as properties.

forked from here: http://joaocorreia.pt/google-analytics-scripts/google-analytics-php-cookie-parser/

## Usage

```php
	// In your controller:
        public $components = array('GACookie');

	// then when you want to extract and store the data
	$this->GACookie->parse();

	// in my Lead model I have all 9 of these fields, so I set them after parsing
	$this->request->data['Lead']['ga_campaign_source'] = $this->GACookie->campaign_source;
	$this->request->data['Lead']['ga_campaign_name'] = $this->GACookie->campaign_name;
	$this->request->data['Lead']['ga_campaign_medium'] = $this->GACookie->campaign_medium;
	$this->request->data['Lead']['ga_campaign_content'] = $this->GACookie->campaign_content;
	$this->request->data['Lead']['ga_campaign_term'] = $this->GACookie->campaign_term;
	$this->request->data['Lead']['ga_first_visit'] = $this->GACookie->first_visit;
	$this->request->data['Lead']['ga_previous_visit'] = $this->GACookie->previous_visit;
	$this->request->data['Lead']['ga_current_visit_started'] = $this->GACookie->current_visit_started;
	$this->request->data['Lead']['ga_times_visited'] = $this->GACookie->times_visited;

	// save all the data
	if ($this->Lead->save($this->request->data)) {


```
