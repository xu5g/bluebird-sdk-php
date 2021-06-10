<?php
/**
 * TSP-Client-SDK
 * @author macnie<mac@lenmy.com>
 * @since 2019.6.19
 * @example
 * try{
 *      $client = new \Macnie\Tsp\TspClient( ['gateway'=>'','token'=>''] );
 *      $client->setHost($imei_sn,$host,$port);
 * }catch(Excetion $e){
 *      ......
 * }
 */

namespace liu\tsp;

class TspClient
{
    private $config = null;
    private $transId = '';

    public function __construct($params = [])
    {
        $this->config = $params;
        if (!isset($this->config['gateway']) || empty($this->config['gateway']) || !isset($this->config['appkey']) || empty($this->config['appkey']) || !isset($this->config['token']) || empty($this->config['token'])) {
            throw new \Exception('Configure File Miss Gateway Or Appkey Or Token Param!');
        }
        $this->transId = $this->config['appkey'].date("YmdHis",time()).mt_rand(100000,999999).mt_rand(100000,999999);
    }

    /**
     * 获取设备列表
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function getDevices($params = [])
    {
        $request = new Request();
        return $request->get($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPDevicesGetPath, $params);
    }

    /**
     * 批量获取设备信息
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function getBatchDevices($params = [])
    {
        $request = new Request();
        return $request->get($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPDevicesBatchGetPath, $params);
    }

    /**
     * 获取设备详情
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function getDevice($params = [])
    {
        $request = new Request();
        return $request->get($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPDeviceGetPath, $params);
    }

    /**
     * 更改设备信息
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function updateDevice($params = [])
    {
        $request = new Request();
        return $request->put($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPDeviceUpdatePath, $params);
    }

    /**
     * 创建设备信息
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function CreateDevice($params = [])
    {
        $request = new Request();
        return $request->post($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPDeviceCreatePath, $params);
    }

    /**
     * 下发定位指令
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function sendLocate($params = [])
    {
        $request = new Request();
        return $request->get($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPDeviceLocatePath, $params);
    }

    /**
     * 获取设备是否在线
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function getDeviceIsOnline($params = [])
    {
        $request = new Request();
        return $request->get($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPDeviceOnlinePath, $params);
    }

    /**
     * 透传报文
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function sendMessage($params = [])
    {
        $request = new Request();
        return $request->post($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPDeviceMessagePath, $params);
    }

    /**
     * 获取设备功能清单
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function getDeviceModules($params = [])
    {
        $request = new Request();
        return $request->get($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPDeviceModulesPath, $params);
    }

    /**
     * 设备绑定
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function bindDevice($params = [])
    {
        $request = new Request();
        return $request->put($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPDeviceBindPath, $params);
    }

    /**
     * 设备解绑
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function unbindDevice($params = [])
    {
        $request = new Request();
        return $request->put($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPDeviceUnBindPath, $params);
    }

    /**
     * 下发设备寻找指令
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function sendFindDevice($params = [])
    {
        $request = new Request();
        return $request->get($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPDeviceFindPath, $params);
    }

    /**
     * 下发定位上报时间间隔指令
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function sendLocateUpload($params = [])
    {
        $request = new Request();
        return $request->put($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPDeviceLocateUploadPath, $params);
    }

    /**
     * 下发定位时间段指令
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function sendUdtime($params = [])
    {
        $request = new Request();
        return $request->put($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPDeviceUdtimePath, $params);
    }

    /**
     * 下发设置亲情号码指令
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function sendFamily($params = [])
    {
        $request = new Request();
        return $request->put($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPDeviceFamilyPath, $params);
    }

    /**
     * 下发设置定位模式指令
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function sendLocateMode($params = [])
    {
        $request = new Request();
        return $request->put($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPDeviceLocateModePath, $params);
    }

    /**
     * 下发设置终端host指令
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function sendHost($params = [])
    {
        $request = new Request();
        return $request->put($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPDeviceHostPath, $params);
    }

    /**
     * 下发关机指令
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function sendPowerOff($params = [])
    {
        $request = new Request();
        return $request->get($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPDevicePowerOffPath, $params);
    }

    /**
     * 下发重启指令
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function sendRestart($params = [])
    {
        $request = new Request();
        return $request->get($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPDeviceRestartPath, $params);
    }

    /**
     * 下发聆听指令
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function sendMonitor($params = [])
    {
        $request = new Request();
        return $request->get($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPDeviceMonitorPath, $params);
    }

    /**
     * 下发设置免打扰时间段指令
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function sendDnd($params = [])
    {
        $request = new Request();
        return $request->put($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPDeviceDndPath, $params);
    }

    /**
     * 变更设备状态
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function deviceUpdateStatus($params = [])
    {
        $request = new Request();
        return $request->put($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPDeviceStatusPath, $params);
    }

    /**
     * 删除设备
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function deviceDelete($params = [])
    {
        $request = new Request();
        return $request->delete($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPDeviceDeletePath, $params);
    }

    /**
     * 下发设置睡眠时间段指令
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function deviceSleepTime($params = [])
    {
        $request = new Request();
        return $request->put($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPDeviceSleepTimePath, $params);
    }

    /**
     * 获取最新体温数据
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function getTemperature($params = [])
    {
        $request = new Request();
        return $request->get($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPTemperatureGetPath, $params);
    }

    /**
     * 获取体温数据列表
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function getTemperatures($params = [])
    {
        $request = new Request();
        return $request->get($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPTemperaturesGetPath, $params);
    }

    /**
     * 获取体温测量间隔时间
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function getTemperatureUpload($params = [])
    {
        $request = new Request();
        return $request->get($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPTemperatureUploadGetPath, $params);
    }

    /**
     * 设置体温测量间隔时间
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function updateTemperatureUpload($params = [])
    {
        $request = new Request();
        return $request->put($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPTemperatureUploadSetPath, $params);
    }

    /**
     * 获取最新心率数据
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function getHeart($params = [])
    {
        $request = new Request();
        return $request->get($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPHeartGetPath, $params);
    }

    /**
     * 获取心率数据列表
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function getHearts($params = [])
    {
        $request = new Request();
        return $request->get($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPHeartsGetPath, $params);
    }

    /**
     * 获取心率测量间隔时间
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function getHeartUpload($params = [])
    {
        $request = new Request();
        return $request->get($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPHeartUploadGetPath, $params);
    }

    /**
     * 设置心率测量间隔时间
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function updateHeartUpload($params = [])
    {
        $request = new Request();
        return $request->put($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPHeartUploadSetPath, $params);
    }

    /**
     * 获取最新血压数据
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function getBlood($params = [])
    {
        $request = new Request();
        return $request->get($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPBloodGetPath, $params);
    }

    /**
     * 获取血压数据列表
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function getBloods($params = [])
    {
        $request = new Request();
        return $request->get($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPBloodsGetPath, $params);
    }

    /**
     * 获取血压测量间隔时间
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function getBloodUpload($params = [])
    {
        $request = new Request();
        return $request->get($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPBloodUploadGetPath, $params);
    }

    /**
     * 设置血压测量间隔时间
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function updateBloodUpload($params = [])
    {
        $request = new Request();
        return $request->put($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPBloodUploadSetPath, $params);
    }

    /**
     * 获取计步数据
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function getSteps($params = [])
    {
        $request = new Request();
        return $request->get($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPStepsGetPath, $params);
    }

    /**
     * 获取轨迹数据
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function getTracks($params = [])
    {
        $request = new Request();
        return $request->get($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPTracksGetPath, $params);
    }

    /**
     * 获取睡眠数据列表
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function getSleeps($params = [])
    {
        $request = new Request();
        return $request->get($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPSleepsGetPath, $params);
    }

    /**
     * 获取最新的睡眠数据
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function getSleep($params = [])
    {
        $request = new Request();
        return $request->get($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPSleepGetPath, $params);
    }

    /**
     * 获取围栏列表
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function getFences($params = [])
    {
        $request = new Request();
        return $request->get($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPFencesGetPath, $params);
    }

    /**
     * 创建围栏
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function createFence($params = [])
    {
        $request = new Request();
        return $request->post($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPFenceCreatePath, $params);
    }

    /**
     * 删除围栏
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function deleteFence($params = [])
    {
        $request = new Request();
        return $request->delete($this->transId, $this->config['token'], $this->config['gateway'].$request::TspFenceDeletePath, $params);
    }

    /**
     * 添加maclist
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function createMacList($params = [])
    {
        $request = new Request();
        return $request->post($this->transId, $this->config['token'], $this->config['gateway'].$request::TspMacListCreatePath, $params);
    }

    /**
     * maclist列表
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function getMacLists($params = [])
    {
        $request = new Request();
        return $request->get($this->transId, $this->config['token'], $this->config['gateway'].$request::TspMacListsGetPath, $params);
    }

    /**
     * 删除maclist
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function deleteMacList($params = [])
    {
        $request = new Request();
        return $request->delete($this->transId, $this->config['token'], $this->config['gateway'].$request::TspMacListDeletePath, $params);
    }

    /**
     * 获取macbook列表
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function getMacBooks($params = [])
    {
        $request = new Request();
        return $request->get($this->transId, $this->config['token'], $this->config['gateway'].$request::TspMacBooksGetPath, $params);
    }

    /**
     * 获取macbook详情
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function getMacBook($params = [])
    {
        $request = new Request();
        return $request->get($this->transId, $this->config['token'], $this->config['gateway'].$request::TspMacBookGetPath, $params);
    }

    /**
     * 更新macbook
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function updateMacBook($params = [])
    {
        $request = new Request();
        return $request->put($this->transId, $this->config['token'], $this->config['gateway'].$request::TspMacBookUpdatePath, $params);
    }

    /**
     * 重绘macbook
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function drawMacBook($params = [])
    {
        $request = new Request();
        return $request->put($this->transId, $this->config['token'], $this->config['gateway'].$request::TspMacBookDrawPath, $params);
    }

    /**
     * 删除macbook
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function deleteMacBook($params = [])
    {
        $request = new Request();
        return $request->delete($this->transId, $this->config['token'], $this->config['gateway'].$request::TspMacBookDeletePath, $params);
    }

    /**
     * 获取考勤数据
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function getAttences($params = [])
    {
        $request = new Request();
        return $request->get($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPAttencesGetPath, $params);
    }

    /**
     * 获取报文数据
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function getMessages($params = [])
    {
        $request = new Request();
        return $request->get($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPMessagesGetPath, $params);
    }

    /**
     * 获取api日志
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function getApiLogs($params = [])
    {
        $request = new Request();
        return $request->get($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPApiLogsGetPath, $params);
    }

    /**
     * 获取core日志
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function getCoreLogs($params = [])
    {
        $request = new Request();
        return $request->get($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPCoreLogsGetPath, $params);
    }

    /**
     * 获取guard日志
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function TSPGuardLogsGetPath($params = [])
    {
        $request = new Request();
        return $request->get($this->transId, $this->config['token'], $this->config['gateway'].$request::TSPGuardLogsGetPath, $params);
    }
}
