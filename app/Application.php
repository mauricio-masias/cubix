<?php 

namespace App;

class Application extends \Illuminate\Foundation\Application
{

	public function publicPath()
	{
	    return $this->basePath.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'public_html';
	}
}