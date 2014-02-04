<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Place extends DataMapper {

var $table            = 'places';
var $default_order_by = array('name');
var $has_one          = array(
                            'placedatasource',
                            'placedatasource_googlespreadsheet' => array(
                                'join_other_as' => 'placedatasource',
                                'join_table' => 'placedatasources'
                            ),
                            'placedatasource_arcgisrest' => array(
                                'join_other_as' => 'placedatasource',
                                'join_table' => 'placedatasources'
                            ),
                            'placedatasource_cartodb' => array(
                                'join_other_as' => 'placedatasource',
                                'join_table' => 'placedatasources'
                            ),
                            'placedatasource_wfs' => array(
                                'join_other_as' => 'placedatasource',
                                'join_table' => 'placedatasources'
                            ),
                        );
var $has_many         = array('placecategory',);




/*****************************************************************************
 * INSTANCE METHODS
 *****************************************************************************/

// fetch the list of categories for this Place
// if $join is given, return is a string joined with that separator
// if $join is omitted, return is a list
public function listCategories($join=null) {
    $categories = array();
    foreach ($this->placecategory as $pcat) $categories[] = $pcat->name;

    if ($join) $categories = implode($join,$categories);

    return $categories;
}





} // end of Model
