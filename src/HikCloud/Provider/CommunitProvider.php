<?php
	declare(strict_types=1);
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 社区管理
	 *  ======================================================
	 */

	namespace Imactool\IotCloud\HikCloud\Provider;

	use Imactool\IotCloud\Exception\InvalidArgumentException;
	use Imactool\IotCloud\HikCloud\AbstractProvider;

	class CommunitProvider extends AbstractProvider
	{

		/**
		 * 在云眸社区租户下新增一个社区
		 * 注：默认不支持6000C，需要在web端绑定边缘服务后才能支持（后续的楼栋、单元、房屋、人员接口在此基础上才会实时同步给6000C）
		 * @param array $params
		 *
		 * @return mixed
		 * @throws InvalidArgumentException
		 * @author cc
		 */
		public function communities(array $params)
		{
			if (!\array_key_exists('communityName',$params)){
				throw new InvalidArgumentException('缺少必要参数 communityName');
			}
			if (!\array_key_exists('provinceCode',$params)){
				throw new InvalidArgumentException("缺少必要参数 provinceCode");
			}
			if (!\array_key_exists('addressDetail',$params)){
				throw new InvalidArgumentException("缺少必要参数 addressDetail");
			}

			return $this->postJson('/api/v1/estate/system/communities',$params);
		}

		/**
		 * 功能描述
		 * 从云眸社区租户下删除一个社区。
		 * @param string $communityId
		 *
		 * @return mixed
		 * @throws InvalidArgumentException
		 * @author cc
		 */
		public function delCommunities(string $communityId)
		{
			if (empty($communityId)){
				throw new InvalidArgumentException("缺少必要参数");
			}
			$params = ['communityId'=>$communityId];
			return $this->deleteJson('/api/v1/estate/system/communities/'.$communityId,$params);

		}

		/**
		 * 修改社区
		 * 修改云眸社区租户下的社区基础信息。（全量修改）
		 * @param array $params
		 *
		 * @return mixed
		 * @throws InvalidArgumentException
		 * @author cc
		 */
		public function updateCommunity(array $params)
		{
			if (!\array_key_exists('communityId',$params)){
				throw new InvalidArgumentException("缺少必要参数 communityId");
			}
			if (!\array_key_exists('communityName',$params)){
				throw new InvalidArgumentException("缺少必要参数 communityName");
			}
			if (!\array_key_exists('provinceCode',$params)){
				throw new InvalidArgumentException("缺少必要参数 provinceCode");
			}
			if (!\array_key_exists('addressDetail',$params)){
				throw new InvalidArgumentException("缺少必要参数 addressDetail");
			}
			return $this->postJson('/api/v1/estate/system/communities/actions/updateCommunity',$params);
		}

		/**
		 * 分页查询云眸社区租户下的社区
		 * @param array|int[] $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function getCommunities(array $params = [])
		{
			if (empty($params)){
				$params = ['pageNo'=>1,'pageSize'=>100];
			}
			$endpoint = "/api/v1/estate/system/communities/actions/list";
			return $this->getJson($endpoint,$params);
		}

	}