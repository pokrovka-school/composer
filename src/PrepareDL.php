<?php
namespace ProjectSoft;

class PrepareDL {

	public static function prepareItem(array $data, \DocumentParser $modx, $_DL, \prepare_DL_Extender $_extDocLister)
	{
		$month = array(
			'1' =>  'января',
			'2'	=>  'февраля',
			'3' =>  'марта',
			'4' =>  'апреля',
			'5' =>  'мая',
			'6' =>  'июня',
			'7' =>  'июля',
			'8' =>  'августа',
			'9' =>  'сентября',
			'10' => 'октября',
			'11' => 'ноября',
			'12' => 'декабря'
		);
		$data['out_date'] = "";
		$data['seo_date'] = "";
		$date = trim($data['news_date']);
		if(($date = strtotime($data['news_date']))):
			$newsdate = date("j.n.Y", $date);
			$list = explode('.', $newsdate);
			$arr = array(
				$list[0],
				$month[$list[1]],
				$list[2]
			);
			$data['out_date'] = implode(' ', $arr)." года";
			$data['seo_date'] = date('c', $date);
		else:
			$date = intval($data['news_date']);
			$newsdate = date("j.n.Y", $date);
			$list = explode('.', $newsdate);
			$arr = array(
				$list[0],
				$month[$list[1]],
				$list[2]
			);
			$data['out_date'] = implode(' ', $arr)." года";
			$data['seo_date'] = date('c', $date);
		endif;
		$data['alt'] = Util::hsc($modx, $data['pagetitle']);
		return $data;
	}
}
