<?php


namespace liu\tsp;


use Curl\Curl;

class Request
{
    /** 身份认证 **/
    const TSPAuthPath = "/tsp/auth/token"; // 鉴权（auth）

    /** 体温管理 **/
    const TSPTemperatureGetPath = "/tsp/temperature/get";        // 获取最新体温数据
    const TSPTemperaturesGetPath = "/tsp/temperatures/get";       // 获取体温结果列表
    const TSPTemperatureUploadGetPath = "/tsp/temperature/upload/get"; // 获取体温测量间隔时间
    const TSPTemperatureUploadSetPath = "/tsp/temperature/upload/set"; // 设置体温测量间隔时间

    /** 心率管理 **/
    const TSPHeartGetPath = "/tsp/heart/get";        // 获取最新心率数据
    const TSPHeartsGetPath = "/tsp/hearts/get";       // 获取心率结果列表
    const TSPHeartUploadGetPath = "/tsp/heart/upload/get"; // 获取心率测量间隔时间
    const TSPHeartUploadSetPath = "/tsp/heart/upload/set"; // 设置心率测量间隔时间

    /** 血压管理 **/
    const TSPBloodGetPath = "/tsp/blood/get";        // 获取最新血压数据
    const TSPBloodsGetPath = "/tsp/bloods/get";       // 获取血压结果列表
    const TSPBloodUploadGetPath = "/tsp/blood/upload/get"; // 获取血压测量间隔时间
    const TSPBloodUploadSetPath = "/tsp/blood/upload/set"; // 设置血压测量间隔时间

    /** 计步管理 **/
    const TSPStepsGetPath = "/tsp/steps/get"; // 获取计步数据列表

    /** 睡眠管理 **/
    const TSPSleepsGetPath = "/tsp/sleeps/get"; // 获取睡眠数据列表
    const TSPSleepGetPath = "/tsp/sleep/get";  // 获取最近一次测量的睡眠数据

    /** 轨迹管理 **/
    const TSPTracksGetPath = "/tsp/tracks/get"; // 获取轨迹

    /** 设备管理 **/
    const TSPDeviceGetPath = "/tsp/device/get";           // 获取设备详情
    const TSPDeviceUpdatePath = "/tsp/device/update";        // 更新设备信息
    const TSPDeviceCreatePath = "/tsp/device/create";        // 创建设备信息
    const TSPDevicesGetPath = "/tsp/devices/get";          // 获取设备列表
    const TSPDevicesBatchGetPath = "/tsp/devices/batch/get";    // 批量获取设备信息
    const TSPDeviceLocatePath = "/tsp/device/locate";        // 下发定位指令到终端
    const TSPDeviceOnlinePath = "/tsp/device/online";        // 获取设备是否在线
    const TSPDeviceMessagePath = "/tsp/device/message";       // 向设备透传报文
    const TSPDeviceModulesPath = "/tsp/device/modules";       // 获取设备功能清单
    const TSPDeviceBindPath = "/tsp/device/bind";          // 设备绑定
    const TSPDeviceUnBindPath = "/tsp/device/unbind";        // 设备解绑
    const TSPDeviceFindPath = "/tsp/device/find";          // 下发寻找设备指令
    const TSPDeviceLocateUploadPath = "/tsp/device/locate/upload"; // 下发定位上报间隔指令
    const TSPDeviceUdtimePath = "/tsp/device/udtime";        // 下发定位时间段指令
    const TSPDeviceFamilyPath = "/tsp/device/family";        // 下发设置亲情号码指令
    const TSPDeviceLocateModePath = "/tsp/device/locate/mode";   // 下发设置定位模式指令
    const TSPDeviceHostPath = "/tsp/device/host";          // 下发设置终端host指令
    const TSPDevicePowerOffPath = "/tsp/device/poweroff";      // 下发关机指令
    const TSPDeviceRestartPath = "/tsp/device/restart";       // 下发重启指令
    const TSPDeviceMonitorPath = "/tsp/device/monitor";       // 下发聆听指令
    const TSPDeviceDndPath = "/tsp/device/dnd";           // 下发设置免打扰指令
    const TSPDeviceStatusPath = "/tsp/device/status";        // 更改设备状态
    const TSPDeviceDeletePath = "/tsp/device/delete";        // 删除设备
    const TSPDeviceSleepTimePath = "/tsp/device/sleeptime";     // 下发睡眠时间段指令
    const TSPDeviceBatchLocateModePath = "/tsp/device/batch/locate/upload"; // 批量设置设备定位模式

    /** 围栏管理 **/
    const TSPFencesGetPath = "/tsp/fences/get";   // 获取围栏列表
    const TSPFenceCreatePath = "/tsp/fence/create"; // 添加围栏
    const TspFenceDeletePath = "/tsp/fence/delete"; // 删除围栏

    /** 定位纠偏管理 **/
    const TspMacListCreatePath = "/tsp/maclist/create"; // 添加maclist
    const TspMacListsGetPath = "/tsp/maclists/get";   // 获取maclist列表
    const TspMacListDeletePath = "/tsp/maclist/delete"; // 删除maclist
    const TspMacBooksGetPath = "/tsp/macbooks/get";   // 获取macbook列表
    const TspMacBookGetPath = "/tsp/macbook/get";    // 获取macbook详情
    const TspMacBookUpdatePath = "/tsp/macbook/update"; // 更新macbook
    const TspMacBookDrawPath = "/tsp/macbook/draw";   // 重绘macbook
    const TspMacBookDeletePath = "/tsp/macbook/delete"; // 删除macbook

    /** 考勤管理 **/
    const TSPAttencesGetPath = "/tsp/attences/get"; // 获取考勤数据列表

    /** 报文管理 **/
    const TSPMessagesGetPath = "/tsp/messages/get"; // 获取报文数据列表

    /** 日志管理 **/
    const TSPApiLogsGetPath = "/tsp/apilogs/get";   // 获取api日志列表
    const TSPCoreLogsGetPath = "/tsp/corelogs/get";  // 获取core日志列表
    const TSPGuardLogsGetPath = "/tsp/guardlogs/get"; // 获取guard日志列表

    /** 视频监控管理 **/
    const TSPYmonitorAccesstokenPath = "/tsp/ysmonitor/accesstoken";   // 获取萤石accesstoken


    /**
     * 封装的GET方法
     * @param $transId
     * @param $token
     * @param $url
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function get($transId, $token, $url, $params = [])
    {
        return $this->request('get', $transId, $token, $url, $params);
    }

    /**
     * 封装的POST方法
     * @param $transId
     * @param $token
     * @param $url
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function post($transId, $token, $url, $params = [])
    {
        return $this->request('post', $transId, $token, $url, $params);
    }

    /**
     * 封装的PUT方法
     * @param $transId
     * @param $token
     * @param $url
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function put($transId, $token, $url, $params = [])
    {
        return $this->request('put', $transId, $token, $url, $params);
    }

    /**
     * 封装的DELETE方法
     * @param $transId
     * @param $token
     * @param $url
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function delete($transId, $token, $url, $params = [])
    {
        return $this->request('delete', $transId, $token, $url, $params);
    }

    /**
     * 请求中间件
     * @param string $transId
     * @param string $token
     * @param string $url
     * @param array $params
     * @param string $type
     * @return mixed
     * @throws \Exception
     */
    public function request($type = 'post', $transId = '', $token = '', $url = '', $params = [])
    {
        $http = new Curl();
        $http->setHeader('ContentType', 'application/json');
        $http->setHeader('source', 'TspClientSdk');
        if ($transId != '') {
            $http->setHeader('transid', $transId);
        }
        if ($token != '') {
            $http->setHeader('token', $token);
        }
        $http->setDefaultJsonDecoder($assoc = true);
        $result = $http->$type($url, $params);
        if ($http->error) {
            if ($http->errorCode == 7) {
                $status = 107;
            } else {
                $status = $http->errorCode;
            }
            return ['status' => $status, 'message' => $http->errorMessage];
        } else {
            return $result;
        }
    }
}