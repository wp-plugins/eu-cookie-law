<?php
/*
Plugin Name:  EU Cookie Law
Plugin URI:   http://pleer.co.uk/wordpress/plugins/eu-cookie-law/
Description:  Inserts a bar within your website to warn users about the EU cookie law, with a popup for more information. Clicking accept will remove the bar for a selected amount of time
Version:      1.0
Author:       Shane Jones & Alex Moss
Author URI:   http://pleer.co.uk/
Contributors: pleer, ShaneJones

Copyright (C) 2010-2012, Shane Jones & Alex Moss
All rights reserved.

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
Neither the name of Alex Moss or pleer nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission.
THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

*/


if ( is_admin() && ( !defined( 'DOING_AJAX' ) || !DOING_AJAX ) ){
	require 'class-admin.php';
	register_activation_hook(__FILE__, 'pea_cook_defaults');
} else {
	require 'class-frontend.php';
}





?>