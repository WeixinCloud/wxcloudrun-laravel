# wxcloudrun-laravel
[![GitHub license](https://img.shields.io/github/license/WeixinCloud/wxcloudrun-express)](https://github.com/WeixinCloud/wxcloudrun-express)
![GitHub package.json dependency version (prod)](https://img.shields.io/badge/php-7.3-green)

微信云托管 Laravel 框架模板，实现简单的计数器读写接口，使用云托管 MySQL 读写、记录计数值。

![](https://qcloudimg.tencent-cloud.cn/raw/be22992d297d1b9a1a5365e606276781.png)


## 快速开始
前往 [微信云托管快速开始页面](https://developers.weixin.qq.com/miniprogram/dev/wxcloudrun/src/basic/guide.html)，选择相应语言的模板，根据引导完成部署。

## 本地调试
下载代码在本地调试，请参考[微信云托管本地调试指南](https://developers.weixin.qq.com/miniprogram/dev/wxcloudrun/src/guide/debug/)。


## 目录结构说明
~~~
.
├── Dockerfile                  Dockerfile 文件
├── LICENSE                     LICENSE 文件
├── README.md                   README 文件
├── app                         应用目录
├── artisan                     artisan
├── bootstrap                   框架的启动和自动载入配置
├── composer.json               composer 文件
├── composer.lock               composer 文件
├── conf                        配置文件
│   ├── fpm.conf                fpm 配置
│   ├── nginx.conf              nginx 配置
│   └── php.ini                 php 配置
├── config                      应用所有的配置文件   
├── container.config.json       模板部署「服务设置」初始化配置（二开请忽略）
├── database                    数据库迁移文件及填充文件
├── public                      应用入口文件 index.php 和前端资源文件
├── resources                   应用视图文件和未编译的原生前端资源文件
├── routes                      应用定义的所有路由
├── run.sh                      镜像启动脚本
├── server.php                  命令行入口文件       
├── storage                     存放框架生成的文件和缓存
└── webpack.mix.js
~~~


## 服务 API 文档

### `GET /api/count`

获取当前计数

#### 请求参数

无

#### 响应结果

- `code`：错误码
- `data`：当前计数值

##### 响应结果示例

```json
{
  "code": 0,
  "data": 42
}
```

#### 调用示例

```
curl https://<云托管服务域名>/api/count
```



### `POST /api/count`

更新计数，自增或者清零

#### 请求参数

- `action`：`string` 类型，枚举值
  - 等于 `"inc"` 时，表示计数加一
  - 等于 `"clear"` 时，表示计数重置（清零）

##### 请求参数示例

```
{
  "action": "inc"
}
```

#### 响应结果

- `code`：错误码
- `data`：当前计数值

##### 响应结果示例

```json
{
  "code": 0,
  "data": 42
}
```

#### 调用示例

```
curl -X POST -H 'content-type: application/json' -d '{"action": "inc"}' https://<云托管服务域名>/api/count
```

## 使用注意
如果不是通过微信云托管控制台部署模板代码，而是自行复制/下载模板代码后，手动新建一个服务并部署，需要在「服务设置」中补全以下环境变量，才可正常使用，否则会引发无法连接数据库，进而导致部署失败。
- MYSQL_ADDRESS
- MYSQL_PASSWORD
- MYSQL_USERNAME
以上三个变量的值请按实际情况填写。如果使用云托管内MySQL，可以在控制台MySQL页面获取相关信息。


## License

[MIT](./LICENSE)
