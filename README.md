# wxcloudrun-laravel
[![GitHub license](https://img.shields.io/github/license/WeixinCloud/wxcloudrun-express)](https://github.com/WeixinCloud/wxcloudrun-express)
![GitHub package.json dependency version (prod)](https://img.shields.io/badge/php-7.3-green)

微信云托管 Laravel 框架模版，实现简单的计数器读写接口，使用云托管 MySQL 读写、记录计数值。

![](https://qcloudimg.tencent-cloud.cn/raw/be22992d297d1b9a1a5365e606276781.png)


## 快速开始
前往 [微信云托管快速开始页面](https://developers.weixin.qq.com/miniprogram/dev/wxcloudrun/src/basic/guide.html)，选择相应语言的模板，根据引导完成部署。


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
├── container.config.json       微信云托管流水线配置
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


## 本地调试
使用 VSCode 插件，可以在支持 Docker 环境的系统进行本地调试云调用,更多信息请看 [本地调试中如何使用「开放接口服务」](https://developers.weixin.qq.com/miniprogram/dev/wxcloudrun/src/guide/weixin/open.html#%E6%9C%AC%E5%9C%B0%E8%B0%83%E8%AF%95%E4%B8%AD%E5%A6%82%E4%BD%95%E4%BD%BF%E7%94%A8%E3%80%8C%E5%BC%80%E6%94%BE%E6%8E%A5%E5%8F%A3%E6%9C%8D%E5%8A%A1%E3%80%8D)
### 本地运行前置要求
项目从环境变量中获取了数据库相关信息，这样设计主要考虑到容器和容器配置信息的安全性。
有哪些信息可以看项目config.php 中mysql 配置部分，项目本地运行可能会给你提醒undefine异常就是因为无法获取必备的环境变量信息：
```ini
MYSQL_ADDRESS=云数据库外网地址:26892
MYSQL_PASSWORD=密码
MYSQL_USERNAME=用户名
MYSQL_DATABASE=实例名称
```
本地可以选择直接加到环境变量来避开异常信息:
```bash
export MYSQL_ADDRESS=云数据库外网地址:26892
export MYSQL_PASSWORD=密码
export MYSQL_USERNAME=用户名
export MYSQL_DATABASE=实例名称
```

### 一键安装
一键安装我们可以依赖docker-composer来帮助我们完成整个服务的部署。本地一键部署一样需要我们给容器植入环境变量。
此项目提供的`docker-compose.yml` 文件中已经帮我们植入了环境变量，默认使用本地`.env-local`配置文件。如果你有自己的配置文件请修改配置。

####  一键部署
```bash
docker-compose up -d
```
项目本地会启用 8000端口提供服务。本地直接更新代码刷新即可以看到效果。`docker-compose`的更多使用详情请看官网文档。



## License

[MIT](./LICENSE)
