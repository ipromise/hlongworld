<?php

/**
 * @author wangzilong
 * @date 20160623
 * @description 首页分类缓存
 */
class PerformanceFilter extends CFilter
{
        // 动作被执行之前应用的逻辑
	protected function preFilter($filterChain)
	{
            // 如果动作不应被执行，此处返回 false
            return true; 
	}
        
        // 动作执行之后应用的逻辑
	protected function postFilter($filterChain)
	{
            $value = AdminClassify::model()->getAllClassify();
            GlobalF::setCache('classify', $value);    
	}
}