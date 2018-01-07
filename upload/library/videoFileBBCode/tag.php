<?php

class videoFileBBCode_tag {
	public static function callback(array $tag, array $rendererStates, XenForo_BbCode_Formatter_Base $formatter){
		$inner = $formatter->renderTree($tag['children']);
		$outerbef2= '<a href="'.htmlspecialchars($inner).'">';
		$outeraft2= '</a>';
		$outerbef = '<div style="text-align: center;"><video class="videoFileBbcode sectionMain" src="'.htmlspecialchars($inner).'" preload="metadata" controls style="max-width: 400px; max-height: 225px; background-color: black;">'.$outerbef2;
		$outeraft = $outeraft2.'</video></div>';
		if(
			$formatter instanceof XenForo_BbCode_Formatter_Text
			||
			$formatter instanceof XenForo_BbCode_Formatter_Wysiwyg
		){
			$outerbef = '';
			$outeraft = '';
		}
		if($formatter instanceof XenForo_BbCode_Formatter_HtmlEmail){
			$outerbef = '<a href="'.htmlspecialchars($inner).'">';
			$outeraft = '</a>';
		}
		return $outerbef.$inner.$outeraft;
	}
}

