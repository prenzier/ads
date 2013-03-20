<?php
class Query {
	public function getExecutivos() {
		return query_("SELECT * FROM executivos");
	}
}
?>