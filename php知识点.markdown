## 函数

| 函数名称 | 功能 |
| - | - |
| `echo` | 函数 输出字符串群，用逗号隔开 |
| `print` | 函数 输出字符串 有返回值 |
| `var_dump()` | 函数 输出字符串 输出数据类型和长度  |
| `print_r()` | 函数 输出数组 |
| `array()` | 为数组赋值 |
| `is_string()` | 判断是否是字符串返回布尔类型 |
| `is_integer()` | 判断是否是整数返回布尔类型 |
| `is_double()` | 判断是否是浮点数 |
| `is_array()` | 判断是否是数组 |
| `gettype()` | 获取变量的类型 |
| `unset()` | 手动删除变量 |
| `isset()` | 判断一个变量是否呗定义，返回布尔类型 |
| `define("name",value)` | 声明常量 |
| `instanceof` | 判断是否为类型运算符 |
| `floor()` | 向下取整 |
| `ceil()` | 向上取整 |
| `round()` | 四舍五入 |
| `count(数组名)` | 计算数组长度 |
| `implode()` | 将数组转换成字符串，可以用标点分割 |
| `join()` | 将数组转换成字符串，可以用标点分割 |
| `include('文件名')` |  文件包含函数，重新读取一次，不可以多次调用 |
| `include_once('文件名')` |  重新读取一次，可以多次调用 |
| `require('文件名')` | 读取一次，不可以多次调用 |
| `require_once('文件名')` | 读取一次，就算是多次调用，也读取一次 |
| `rand(a,b)` | 产生a到b之间的随机数 |
| `strcmp()` |  判断字符串是否相等 |
| `explode(字符串1,字符串2)` | 将字符串2从字符串1开始截断 |
| `in_array(字符串1，字符串2)` | 如果字符串1包含字符串2，返回真 |
| `header('Content-Type:image/jpeg)` | 指定下载的类型 |
| `header('Content-Disposition:attachment;filename="image.jpg"')` | 文件下载函数 |
| `header('Content-Length:123123')` | 指定下载大小 |
| `readfile()` | 将下载的文件读取出来直接输出 |
| `move_uploaded_file()` | 将临时文件路径（字符串1）移动到真实路径（字符串2）|
| `date(Ymdhis)` | 获得系统当前日期的函数 |

## 符号

`数组下标` => `数组元素` 数组元素指定符  
下标可以是字符串或者数字，变成键值对  
`->` 类语言标记符等同于c++和java的.  
`.`字符串连接  
`!==` 不全等于 不相等或类型不同  
`===` 全等于 相等且类型相同  
`cmd语句` 反引号执行cmd指令  
`@` 错误控制符，如果表达式有错误，则不会运算表达式  


## 2021/10/27

foreach(数组名 as 变量名){

}

foreach(数组名 as 下标名=>变量名){

}  

`function 函数名 (参数1,参数2,...)`  
`global 变量名`  在函数里面调用全局变量
`static 变量名`  静态变量  
`$_POST` 数组接受post提交数据 

****

## php.ini

`date.timezone` = "UTC"  
`upload_max_filesize` | 设置http上传文件的最大尺寸指令
`post_max_size` 上传文件最大尺寸不能超过max_size  