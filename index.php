<?php
/*
 * Copyright (c) 2012-2019 Red Hat, Inc.
 * This program and the accompanying materials are made
 * available under the terms of the Eclipse Public License 2.0
 * which is available at https://www.eclipse.org/legal/epl-2.0/
 *
 * SPDX-License-Identifier: EPL-2.0
 *
 * Contributors:
 *   Red Hat, Inc. - initial API and implementation
 */
echo "Hello World!rrrrr"
?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
<title>てすと</title>
</head>
<body>
	<form id="Rogin" action="">
		<p><label>ログインID(メールアドレス)<input type="text" name="ID" size="40"></label></p>
		<p><label>ログインパスワード(英数字8-20文字)<input type="password" name="PASSWORD" size="40"  maxlength="20"></label></p>
		 <label>IDを保存する<input type="checkbox"></label><br>
		<input type="submit"value="ログイン"> <input type="button"value="ID,パスワードを忘れた場合はこちら">
	</form>
</body>
</html>
