<?php
return  array (	
		//应用ID,您的APPID。
		 'app_id' => "2016101800717610",

		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' => "MIIEpAIBAAKCAQEA02nC3EEe3iY2ivGlo5uePAnijkkXOavruVDzOscY0j93/j5eugytWDaV0Hr5CuuBvsAOd0F6B1sjDakbhSAqrbXZE+n9etYJqOI+vQteGngn1OPT3SfE8uqdHkjJil2sIfS/tlpANKoJZ58SSbnuDQ3JLodVihiyojcsv6Qg7hPsh0npDyVt5dj0WTiBRNZal1/jKRJuhrIqARy3HVvZpyCffyVJur4Rnc35vnpT3fbQwHCWIgkJc+v0vueSk6uWzYzfxooR21GwBKGLpjTuzgVtFjD2nwRTZHMT0mBc6Wg9fs4ASkDMSbdECFw697F9TE4ayGMxrXXzwhdW2sbBhwIDAQABAoIBAEpgGr2B62ob53RaLvuv86sLjzifXhxb70HyyJ8VDBZrXbuEFa8+Zn1yNqJxoMvGro584pnx3wxXc62KoLPk7R7Pqt7motZkFmHjtk6rgR+uxdSPkilrpE4RW9UbpkuXSMdpY0iz14Kvjz91JunpD2ZoQy6rTdyXc8C9yHBjPXKDy4klhB7AnRtgNml2dNP+UiMvcftDqQ/D7c14w39gQnxfv1WHHYIScXOowornu368/W0NCLI+i8bDXYNFUruwU37bLZJkh/QUYqtH33uZNmYp4EQkD3u8cvbCYdy790ipItFY2P3gXX/OtMagVo7xCiuhqRkc12QIZfCX3vSIDIECgYEA/n3t7FTh0OrrEwEQDzZ4i7cV6sKXxOJ2N9ha6zCuadxHe0mNvXZGjqw/kcdALiNqcJ63CikupjVod93c0FVpONOLoO7pToVOnHvWFCRYu0Bw39Jm0FkoB6VChDoDoIB5x9Ymxsf4iv53LtqotW1k0rPbw8bcOPYc6RcdqDlbnesCgYEA1Kp67e9UiU4Z6y+CiQkAeLJvwNpswfExItIqmhdF1+9rk4pC82H1QG7d7Sp0hk0E3iemHl4JIfxviwSKmm/38F9105Dl7vGAEfBti7ioqM/XokACx/DPKfT1qV1ntLgpIsFlMzdixuNdWEXOM3jOE0VZxWMr1EmPSw58cNjE19UCgYEAoo/AVjFWWcRlyqroHj+WOvEFkAMjPUHHcB7E3O0ozDhIdOlkH/0YTvSaWr1jMtWunSfVFil+Qe9lvwO6lF2qrAD9dRyHbX/b2juEYTNidqJQN7jHshjxaAjZd2sze+f1YoBaHqoIColHimdkUxgAylLXc7RoYf5cM0xvxlB1RGcCgYEAvd63gld7kls4qNHyKYbv9NLbE8Pv9ffxdrVNc+XzZadM1J1MyR9cZ/qUCXsuLfn1rqKXneU3IjDPJb8YQGpXYzTXbdygbYUQYvPV2jkz3AQ08ZdU5E4Lp9ocuum5/Y+uqmkggWmhtxCn9nfccfgZhPsV+zVfnFlQpiJ42AexN0ECgYB3r/5vIHsBxsjjLPKCbCygXnOWFCDhoL/rMY4VaYTDP1RSpoPCrLlddrDGjwx6kiEPw9+VRhHkPFKbtg/3fqaFyhctdo0J1Ws1TPcyz8g8GckrOWBuWlfZLFXb+thFjjkYSwOvMyZJ+B2PLpWYniAcFgg6kSbh2P5W8NeNFGIE5w==",
		
		//异步通知地址
		'notify_url' => "http://www.1909a3.com/notice_url",
		
		//同步跳转
		'return_url' => "http://www.1909a3.com/return_url",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDIgHnOn7LLILlKETd6BFRJ0GqgS2Y3mn1wMQmyh9zEyWlz5p1zrahRahbXAfCfSqshSNfqOmAQzSHRVjCqjsAw1jyqrXaPdKBmr90DIpIxmIyKXv4GGAkPyJ/6FTFY99uhpiq0qadD/uSzQsefWo0aTvP/65zi3eof7TcZ32oWpwIDAQAB",
		
	
);