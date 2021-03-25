<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- リセットCSS読み込み -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css">
	<!-- CSS読み込み -->
	<link rel="stylesheet" href="style.css">
	<!-- レスポンシブ読み込み -->
	<link rel="stylesheet" href="css/responsive.css">

	<title>株式会社Flying Corps</title>

	<!-- jQuery CDN読み込み -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

	<div class="wrapper">

		<header>
			<div class="container">
				<div class="header-inner">
					<div class="header-left logo">
						<a href="">
							<img src="img/logo.png" alt="">
						</a>
					</div>
					<!-- <div class="gnav">
						<nav>
							<ul>
								<li>
									<a href="#about-us">
										私たちについて
									</a>
								</li>
								<li>
									<a href="#service">
										事業内容
									</a>
								</li>
								<li>
									<a href="#company">
										会社概要
									</a>
								</li>
							</ul>
						</nav>
					</div> -->
					<!-- <div class="contact-icon">
						<a href="#contact">
							<img src="img/contact-icon.png" alt="">
						</a>
					</div> -->
				</div>
			</div>
		</header>
		
		<?php
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// フォームから送信されたデータを各変数に格納
			$name = $_POST["name"];
			$number = $_POST["number"];
			$mail = $_POST["email"];
			$message = $_POST["message"];
			$email = "gen.guitar1090@gmail.com";
			}
		?>	
		
		<form action="confirm.php" method="post">
			<input type="hidden" name="name" value="<?php echo $name; ?>">
			<input type="hidden" name="number" value="<?php echo $number; ?>">
			<input type="hidden" name="email" value="<?php echo $mail; ?>">
			<input type="hidden" name="message" value="<?php echo $message; ?>">
		
			<div class="wrapper">
				<h2 class="contact-content">
					お問い合わせ内容
				</h2>
				<div class="contact-confirm">
					<div class="container">
						<table>
							<tbody>
								<tr>
									<td>お名前</td>
									<td><?php echo $name; ?></td>
								</tr>
								<tr>
									<td>電話番号</td>
									<td><?php echo $number; ?></td>
								</tr>
								<tr>
									<td>メールアドレス</td>
									<td><?php echo $mail; ?></td>
								</tr>
								<tr>
									<td>お問い合わせ内容</td>
									<td><?php echo $message; ?></td>
								</tr>
							</tbody>
						</table>
						<button type="submit" name="submit" class="submit" value="送信する">送信する</button>
					</div>
				</div>
			</div>

		</form>

		<?php 

			if (isset($_POST["submit"])) { // 送信ボタンが押された時に動作する処理
				mb_language("ja");// 日本語をメールで送る場合
				mb_internal_encoding("UTF-8");
				$subject = "［自動送信］お問い合わせ内容の確認";
				$body =  // メール本文を変数bodyに格納
				// {$name} 様
"お問い合わせありがとうございます。
以下のお問い合わせ内容を、メールにて確認させていただきました。
【 お名前 】
{$name}
【 メール 】
{$mail}
【 電話番号 】
{$number}
【 お問い合わせ内容 】
{$message}
内容を確認のうえ、回答させて頂きます。
しばらくお待ちください。"
;
				
				$fromEmail = 'gen.guitar1090@gmail.com'; // 送信元のメールアドレスを変数fromEmailに格納
				$fromName = "お問い合わせ";// 送信元の名前を変数fromNameに格納
				$header = "From: " .mb_encode_mimeheader($fromName) ."<{$fromEmail}>";// ヘッダ情報を変数headerに格納する
				mb_send_mail($mail, $subject, $body, $header);// メール送信を行う//mb_send_mail("送信先メールアドレス", "件名", "メール本文","メール送信後の画面遷移");
				header("Location: http://xs390487.xsrv.jp/mailto.php");//送信完了画面（mailto.php）へのURLを入る
				exit;			
			}
		?>

		

		<!-- <footer>
			<img src="img/footer-img.png" alt="" class="footer-img">
			<div class="container">
				<div class="section-inner">
					<img src="img/logo.png" alt="" class="footer-logo">
					<div class="footer-nav">
						<nav>
							<ul>
								<li><a href="">ホーム</a></li>
								<li><a href="">私たちについて</a></li>
								<li><a href="">事業内容</a></li>
								<li><a href="">会社概要</a></li>
								<li><a href="">お問い合わせ</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</footer> -->
		
	</div>

	<!-- JS読み込み -->
	<script src="js/main.js"></script>
</body>
</html>