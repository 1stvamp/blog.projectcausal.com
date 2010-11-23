<?php

class JWYSIWYG extends Plugin {

	/*
	 * Required Plugin Information
	 */
	function info()
	{
		return array(
			'name' => 'JWYSIWYG',
			'license' => 'Apache License 2.0',
			'url' => 'http://habariproject.org/',
			'author' => 'Habari Community',
			'authorurl' => 'http://habariproject.org/',
			'version' => '0.6-0.4',
			'description' => 'Publish posts using the JWYSIWYG editor.',
			'copyright' => '2008'
		);
	}

	public function action_admin_header($theme)
	{
		if ( $theme->page == 'publish' ) {
			Stack::add('admin_header_javascript', $this->get_url() . '/jwysiwyg/jquery.wysiwyg.js');
			Stack::add('admin_stylesheet', array($this->get_url() . '/jwysiwyg/jquery.wysiwyg.css', 'screen'));
		}
	}

	public function action_admin_footer($theme)
	{
		if ( $theme->page == 'publish' ) {
			echo <<<JWYSIWYG
			<script type="text/javascript">
			$('label[for=content]').text('');
			$(function()
			{
				$('#content').wysiwyg({
					controls: {
					strikeThrough : { visible : true },
					underline     : { visible : true },

					justifyLeft   : { visible : true },
					justifyCenter : { visible : true },
					justifyRight  : { visible : true },
					justifyFull   : { visible : true },

					indent  : { visible : true },
					outdent : { visible : true },

					subscript   : { visible : true },
					superscript : { visible : true },

					undo : { visible : true },
					redo : { visible : true },

					insertOrderedList    : { visible : true },
					insertUnorderedList  : { visible : true },
					insertHorizontalRule : { visible : true },

					h4: {
						visible: true,
						className: 'h4',
						command: ($.browser.msie || $.browser.safari) ? 'formatBlock' : 'heading',
						arguments: ($.browser.msie || $.browser.safari) ? '<h4>' : 'h4',
						tags: ['h4'],
						tooltip: 'Header 4'
					},
					h5: {
						visible: true,
						className: 'h5',
						command: ($.browser.msie || $.browser.safari) ? 'formatBlock' : 'heading',
						arguments: ($.browser.msie || $.browser.safari) ? '<h5>' : 'h5',
						tags: ['h5'],
						tooltip: 'Header 5'
					},
					h6: {
						visible: true,
						className: 'h6',
						command: ($.browser.msie || $.browser.safari) ? 'formatBlock' : 'heading',
						arguments: ($.browser.msie || $.browser.safari) ? '<h6>' : 'h6',
						tags: ['h6'],
						tooltip: 'Header 6'
					},

					cut   : { visible : true },
					copy  : { visible : true },
					paste : { visible : true },
					html  : { visible: true },
					});
			});
			habari.editor = {
				insertSelection: function(value) {
					var instance = $.data($('#content')[0], 'wysiwyg');
					instance.setContent(instance.getContent() + value);
				}
			}
			</script>
JWYSIWYG;
		}
	}

	public function action_update_check()
	{
		Update::add( 'JWYSIWYG', 'b5f0c17d-22e6-4d6c-8011-c79481d5efc7',  $this->info->version );
	}
}

?>
