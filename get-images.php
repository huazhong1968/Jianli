<?php
// 获取pr文件夹中的图片文件
header('Content-Type: application/json');

$imageDir = 'image/pr/';
$imageFiles = [];

// 扫描文件夹获取所有图片文件
if (is_dir($imageDir)) {
    $files = scandir($imageDir);
    foreach ($files as $file) {
        // 排除 . 和 .. 目录
        if ($file === '.' || $file === '..') {
            continue;
        }
        
        // 检查是否是图片文件
        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $imageFiles[] = $imageDir . $file;
        }
    }
    
    // 按文件名排序（可选）
    sort($imageFiles);
}

// 返回JSON格式的图片列表
echo json_encode($imageFiles);
?>