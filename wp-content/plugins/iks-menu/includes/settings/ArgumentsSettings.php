<?php
/**
 * Iks Menu
 *
 *
 * @package   Iks Menu
 * @author    IksStudio
 * @license   GPL-3.0
 * @link      https://iks-menu.ru
 * @copyright 2019 IksStudio
 */

namespace IksStudio\IKSM\settings;

use IksStudio\IKSM_CORE\settings\SettingsTypes;
use IksStudio\IKSM_CORE\utils\Utils;
use IksStudio\IKSM\utils\UtilsLocal;

class ArgumentsSettings {

	/**
	 * Settings
	 * @var array|null
	 */
	private $settings = null;

	/**
	 * ArgumentsSettings constructor.
	 */
	public function __construct() {
		$this->settings = [
			"source"         => [
				"key"     => "source",
				"type"    => SettingsTypes::$select,
				"label"   => Utils::t( "Menu source" ),
				"options" => UtilsLocal::get_source_options()
			],
			// TODO: Taxonomy can be array...
			"taxonomy"       => [
				"key"         => "taxonomy",
				"type"        => SettingsTypes::$select,
				"label"       => Utils::t( "Taxonomy" ),
				"description" => Utils::t(
					"Select taxonomy registered in your theme or plugins"
				),
				"options"     => Utils::get_taxonomy_options(),
				"depends_on"  => "source",
				"show_if"     => "taxonomy"
			],
			"menu_id"        => [
				"key"         => "menu_id",
				"type"        => SettingsTypes::$select,
				"label"       => Utils::t( "Menu" ),
				"description" => Utils::t(
					"Select custom menu created in \"Appearance\" > \"Menus\""
				),
				"options"     => Utils::get_menu_options(),
				"depends_on"  => "source",
				"show_if"     => "menu"
			],
			"show_posts"     => [
				"key"         => "show_posts",
				"type"        => SettingsTypes::$checkbox,
				"label"       => Utils::t( "Show posts" ),
				"description" => Utils::t(
					"Whether to show posts assigned to terms."
				),
				"default"     => false,
				"depends_on"  => "source",
				"show_if"     => "taxonomy"
			],
			"posts_order_by" => [
				"key"         => "posts_order_by",
				"type"        => SettingsTypes::$select,
				"label"       => Utils::t( "Posts: Order by" ),
				"options"     => $this->get_orderby_post_options(),
				"description" => Utils::t(
					"Field to order posts by."
				),
				"default"     => "date",
				"depends_on"  => "show_posts",
				"show_if"     => true
			],
			"posts_order"    => [
				"key"         => "posts_order",
				"type"        => SettingsTypes::$select,
				"label"       => Utils::t( "Posts: Order" ),
				"options"     => $this->get_order_options(),
				"description" => Utils::t(
					"Whether to order posts in ascending or descending order."
				),
				"default"     => "DESC",
				"depends_on"  => "show_posts",
				"show_if"     => true
			],

			"hide_empty"               => [
				"key"         => "hide_empty",
				"type"        => SettingsTypes::$checkbox,
				"label"       => Utils::t( "Hide empty terms" ),
				"description" => Utils::t(
					"Whether to hide terms not assigned to any posts."
				),
				"default"     => false,
				"depends_on"  => "source",
				"show_if"     => "taxonomy"
			],
			"orderby"                  => [
				"key"         => "orderby",
				"type"        => SettingsTypes::$select,
				"label"       => Utils::t( "Order by" ),
				"options"     => $this->get_orderby_options(),
				"description" => Utils::t(
					"Field to order terms by."
				),
				"default"     => "id",
				"depends_on"  => "source",
				"show_if"     => "taxonomy"
			],
			"order"                    => [
				"key"         => "order",
				"type"        => SettingsTypes::$select,
				"label"       => Utils::t( "Order" ),
				"options"     => $this->get_order_options(),
				"description" => Utils::t(
					"Whether to order terms in ascending or descending order."
				),
				"default"     => "ASC",
				"depends_on"  => "source",
				"show_if"     => "taxonomy"
			],
			"hierarchical"             => [
				"key"         => "hierarchical",
				"type"        => SettingsTypes::$checkbox,
				"label"       => Utils::t( "Hierarchical" ),
				"description" => Utils::t(
					"Whether to include terms that have non-empty descendants (even if 'hide_empty' is set to true)"
				),
				"default"     => true,
				"depends_on"  => "source",
				"show_if"     => "taxonomy"
			],
			"include"                  => [
				"key"         => "include",
				"type"        => SettingsTypes::$text,
				"label"       => Utils::t( "Include terms" ),
				"description" => Utils::t(
					"Comma/space-separated string of term ids to include."
				),
				"depends_on"  => "source",
				"show_if"     => "taxonomy"
			],
			"exclude"                  => [
				"key"         => "exclude",
				"type"        => SettingsTypes::$text,
				"label"       => Utils::t( "Exclude terms" ) . " " . Utils::t( "(with all children)" ),
				"description" => Utils::t(
					"Comma/space-separated string of term ids to exclude."
				),
				"depends_on"  => "source",
				"show_if"     => "taxonomy"
			],
			"exclude_without_children" => [
				"key"         => "exclude_without_children",
				"type"        => SettingsTypes::$text,
				"label"       => Utils::t( "Exclude terms" ) . " " . Utils::t( "(without children)" ),
				"description" => Utils::t(
						"Comma/space-separated string of term ids to exclude."
					) . " " . Utils::t(
						"Children of excluded term will be moved to the parent of this term."
					),
				"depends_on"  => "source",
				"show_if"     => "taxonomy"
			],
			"search"                   => [
				"key"         => "search",
				"type"        => SettingsTypes::$text,
				"label"       => Utils::t( "Search" ),
				"description" => Utils::t(
					"Search criteria to match terms. Will be SQL-formatted with wildcards before and after."
				),
				"depends_on"  => "source",
				"show_if"     => "taxonomy"
			],
			"child_of"                 => [
				"key"         => "child_of",
				"type"        => SettingsTypes::$number,
				"label"       => Utils::t( "Child of" ),
				"description" => Utils::t(
					"Term ID to retrieve all taxonomy elements that are children of the element with the specified ID, regardless of the nesting level."
				),
				"input"       => [
					"min" => 0,
				],
				"depends_on"  => "source",
				"show_if"     => "taxonomy"
			],
			"parent"                   => [
				"key"         => "parent",
				"type"        => SettingsTypes::$number,
				"label"       => Utils::t( "Parent" ),
				"description" => Utils::t(
					"Term ID to retrieve taxonomy elements that are children of the element with the specified ID and are at the first nesting level. If you specify 0, then only top-level elements will be displayed."
				),
				"input"       => [
					"min" => 0,
				],
				"depends_on"  => "source",
				"show_if"     => "taxonomy"
			],
			"childless"                => [
				"key"         => "childless",
				"type"        => SettingsTypes::$checkbox,
				"label"       => Utils::t( "Childless" ),
				"description" => Utils::t(
					"True to limit results to terms that have no children. This parameter has no effect on non-hierarchical taxonomies."
				),
				"depends_on"  => "source",
				"show_if"     => "taxonomy"
			],
		];
	}

	private function get_orderby_options() {
		return [
			[ "id" => "id", "label" => "ID" ],
			[ "id" => "menu_order", "label" => "Menu order" ], // @since 1.7.6
			[ "id" => "name", "label" => Utils::t( "Name" ) ],
			[ "id" => "count", "label" => Utils::t( "Count of posts" ) ],
			[ "id" => "slug", "label" => Utils::t( "Slug" ) ],
			[ "id" => "description", "label" => Utils::t( "Description" ) ],
			/*
			[ "id" => "term_group", "label" => Utils::t( "Term group" ) ],
			[ "id" => "parent", "label" => Utils::t( "Parent" ) ],
			[ "id" => "slug__in", "label" => Utils::t( "slug__in (> WP 4.9)" ) ],
			[ "id" => "meta_value", "label" => Utils::t( "meta_value" ) ],
			[ "id" => "meta_value_num", "label" => Utils::t( "meta_value_num" ) ],
			[ "id" => "none", "label" => Utils::t( "Do not sort" ) ],
			*/
		];
	}

	private function get_orderby_post_options() {
		return [
			[ "id" => "ID", "label" => "ID" ],
			[ "id" => "title", "label" => Utils::t( "Title" ) ],
			[ "id" => "date", "label" => Utils::t( "Date create" ) ],
			[ "id" => "modified", "label" => Utils::t( "Date modified" ) ],
			[ "id" => "author", "label" => "Author" ],
			[ "id" => "type", "label" => Utils::t( "Type" ) ],
			[ "id" => "name", "label" => Utils::t( "Alternative name (slug)" ) ],
			[ "id" => "сontent", "label" => Utils::t( "Сontent" ) ],
			[ "id" => "comment_count", "label" => Utils::t( "Comment count" ) ],
		];
	}

	private function get_order_options() {
		return [
			[ "id" => "ASC", "label" => Utils::t( "ASC" ) ],
			[ "id" => "DESC", "label" => Utils::t( "DESC" ) ],
		];
	}

	/**
	 * @return array|null
	 */
	public function get_settings() {
		return $this->settings;
	}

	/**
	 * @return array|null
	 */
	public function get_tab_settings() {
		return $this->settings;
	}
}
