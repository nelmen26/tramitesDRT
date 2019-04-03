<?php

function active($path)
{
	return request()->is($path) ? "active":"";
}

function breadcrumbs($name, $id=null)
{
  if($id==null)
    return Breadcrumbs::render($name);
  else
    return Breadcrumbs::render($name,$id);
}