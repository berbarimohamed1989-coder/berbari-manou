<?php
// استلام البيانات من JSON المرسلة من صفحة HTML
$data = json_decode(file_get_contents('php://input'), true);

// التأكد من وجود بيانات
if (!$data) exit;

// اسم ملف CSV لحفظ الطلبات
$file = 'orders.csv';

// ترتيب الأعمدة في CSV
$row = [
    $data['fullName'],    // الاسم الكامل
    $data['phone'],       // رقم الهاتف
    $data['wilaya'],      // الولاية
    $data['commune'],     // البلدية
    $data['address'],     // العنوان
    $data['offer'],       // العرض
    $data['shipping'],    // الشحن
    $data['totalPrice']   // السعر الكلي
];

// فتح الملف وإضافة البيانات في نهاية الملف
$fp = fopen($file, 'a');
fputcsv($fp, $row);
fclose($fp);

// إعادة رسالة تأكيد للحفظ
echo "تم حفظ الطلب بنجاح!";
?>
