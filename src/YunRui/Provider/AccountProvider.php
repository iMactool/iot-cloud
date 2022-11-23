<?php
	declare(strict_types=1);
	/**
	 * ======================================================
	 * Author: cc
	 * Created by PhpStorm.
	 * Copyright (c)  cc Inc. All rights reserved.
	 * Desc: 账号管理
	 *  ======================================================
	 */

	namespace Imactool\IotCloud\YunRui\Provider;

	use Imactool\IotCloud\YunRui\AbstractProvider;

	class AccountProvider extends AbstractProvider
	{
		/**
		 * 删除用户或管理员
		 */
		public function deleteUser($userId)
		{
			$params = [
				'userId' => $userId
			];
			return $this->deleteJson('/gateway/membership/api/user/delete/'.$userId,$params);
		}

		/**
		 * 启用用户或管理员账号
		 */
		public function isEnableUser(array $params)
		{
			return $this->postJson('/gateway/membership/api/user/setIsEnable',$params);
		}

		/**
		 * 根据ID查询用户或管理员详情
		 */
		public function getUserInfoById($userId)
		{
			$params = [
				'userId' => $userId
			];
			return $this->getJson('/gateway/membership/api/user/getUserInfo/'.$userId,$params);
		}

		/**
		 * 查询用户或管理员信息
		 */
		public function getUserInfo(array $params)
		{
			return $this->getJson('/gateway/membership/api/user/page',$params);
		}

		/**
		 * 根据手机号查询用户或管理员详情
		 */
		public function getUserInfoByPhone($telephone)
		{
			$params = [
				'telephone' => $telephone
			];
			return $this->getJson('/gateway/membership/api/user/getUser/'.$telephone,$params);
		}

		/**
		 * 新增用户或管理员
		 */
		public function addUser(array $params)
		{
			return $this->postJson('/gateway/membership/api/user/add',$params);
		}

		/**
		 * 查询所有角色信息
		 */
		public function getAllUser()
		{
			return $this->getJson('/gateway/membership/api/user/position/getCurList');
		}

		/**
		 * 修改用户或管理员基本信息
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function updateUser(array $params)
		{
			return $this->postJson('/gateway/membership/api/user/update',$params);
		}

		/**
		 * 修改用户或管理员场所权限
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function updateUserPlaceAuthority(array $params)
		{
			return $this->postJson('/gateway/membership/api/user/storeAuthority',$params);
		}

		/**
		 * 修改用户或管理员角色权限
		 * @param array $params
		 *
		 * @return mixed
		 * @author cc
		 */
		public function updateUserRoleAuthority(array $params)
		{
			return $this->postJson('/gateway/membership/api/user/postion',$params);
		}
	}