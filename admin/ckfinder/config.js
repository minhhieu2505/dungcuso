/*
 Copyright (c) 2007-2019, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.html or https://ckeditor.com/sales/license/ckfinder
 */

var config = {};
var url = window.location.href;
var url = new URL(url);
var token = url.searchParams.get("token");

// Set your configuration options below.
// Examples:
// config.language = 'pl';
// config.skin = 'jquery-mobile';
config.connectorInfo = 'token=' + token;
CKFinder.define( config );