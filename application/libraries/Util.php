<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'HTMLPurifier.auto.php';
class Util
{
	public function renderMarkdown($text)
	{
		static $md;
		$md = new \Sundown\Markdown(\Sundown\Render\HTML);
		return $md->render($text);
		if(!isset($md))
		{
			$md = new \Sundown\Makdown(new MakdownRender,array(
				'tables' => true,
				'autolink' => true,
				'strikethrough' => true,
				'lax_html_blocks' => true,
				'fenced_code_blocks' => true
			));
			$md->getRender()->setRenderFlags(array(
				'hard_wrap' => true
			));
		}
		return self::purify($md->render($text));
	}
	public function purify($html, $scheme = null)
	{
		static $purifiers = array();
		if(!isset($scheme))
		{
			$scheme = '
                h1[style], h2[style], h3[style], h4[style], h5[style], h6[style], hr[style],
                div[style|class], p[style], br[style], a[style|href|target|title|name],
                span[style], strong[style], b[style], i[style], del, u,
                img[style|src|alt|title|width|height],
                pre[class], code[style|class|data-language],
                table[style|border|class], thead[style], tbody[style], tr[style], th[style], td[style|class],
                ul[style], ol[style], li[style],
                dl[style], dt[style], dd[style],
                em[style], cite[style], blockquote[style],
                embed[src|type|allowscriptaccess|allowfullscreen|width|height],
                object[style|width|height|id|data|type],
                param[name|value]
            ';
		}
		if(!isset($purifiers[$scheme]))
		{
			$config = \HTMLPurifier_Config::createDefault();        
            $config->set('HTML.Allowed', $scheme);
            $config->set('Attr.AllowedFrameTargets', '_blank, _top, _parent');
            // $config->set('Attr.AllowedClasses', $allowed_classes);
            $config->set('HTML.SafeObject', true);
            $config->set('HTML.SafeEmbed', true);
            $config->set('Output.FlashCompat', true);

            //$cachePath = \Yaf\Application::app()->getConfig()->htmlpurifier->cache;
            //$config->set('Cache.SerializerPath', $cachePath);


            $config->set('Attr.EnableID', true); // allow a[name]
            $def = $config->getHTMLDefinition(true);
            $def->addAttribute('code', 'data-language', 'Text');
            $def->addAttribute('embed', 'allowfullscreen', 'Text');

            $purifiers[$scheme] = new \HTMLPurifier($config);
		}
		$purifier = $purifiers[$scheme];
		return $purifier->purify($html);
	}
}