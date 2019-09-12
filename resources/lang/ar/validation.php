<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    |   following language lines contain   default error messages used by
    |   validator class. Some of  se rules have multiple versions such
    | as   size rules. Feel free to tweak each of  se messages here.
    |
    */
    'english'              => 'يجب ادخال النص باللغه الانجليزية ' ,
    'arabic'               => ' يجب ادخال النص باللغه العربية',
    'alpha_spaces'         => ' :attribute  قد يحتوي فقط على الحروف والمسافات.',
    'accepted'             => '  :attribute يجب قبوله .',
    'active_url'           => '  :attribute ليس عنوان URL صالحًا .',
    'after'                => '  :attribute يجب أن يكون تاريخ بعد :date.',
    'after_or_equal'       => '  :attribute يجب أن يكون تاريخًا بعد أو يساوي :date.',
    'alpha'                => '  :attribute قد تحتوي على أحرف فقط.',
    'alpha_dash'           => '  :attribute قد تحتوي فقط على أحرف وأرقام وشرطات.',
    'alpha_num'            => '  :attribute قد يحتوي فقط على أحرف وأرقام.',
    'array'                => '  :attribute يجب أن تكون مصفوفة .',
    'before'               => '  :attribute يجب أن يكون تاريخ من قبل :date.',
    'before_or_equal'      => '  :attribute يجب أن يكون تاريخًا قبل أو يساوي :date.',
    'between'              => [
        'numeric' => '  :attribute لابد ان تكون بين :min و :max.',
        'file'    => '  :attribute لابد ان تكون بين :min و :max كيلو بايت.',
        'string'  => '  :attribute لابد ان تكون بين :min و :max .',
        'array'   => '  :attribute لابد ان تكون بين :min و :max العناصر.',
    ],
    'boolean'              => '  :attribute يجب أن يكون الحقل صحيحًا أو خطأ.',
    'confirmed'            => '  :attribute التأكيد غير متطابق.',
    'date'                 => '  :attribute هذا ليس تاريخ صحيح.',
    'date_format'          => '  :attribute لا يتطابق مع التنسيق :format.',
    'different'            => '  :attribute و :o r يجب أن تكون مختلفة.',
    'digits'               => '  :attribute لا بد وأن :digits الأرقام.',
    'digits_between'       => '  :attribute لابد ان تكون بين :min و :max ارقام.',
    'dimensions'           => '  :attribute يحتوي على أبعاد صور غير صالحة.',
    'distinct'             => '  :attribute يحتوي الحقل على قيمة مكررة.',
    'email'                => '  :attribute يجب أن يكون عنوان بريد إلكتروني صالح.',
    'exists'               => '  :attribute المحدد غير صالح.',
    'file'                 => '  :attribute يجب أن يكون الملف.',
    'filled'               => '  :attribute يجب أن يكون الحقل قيمة.',
    'gt'                   => [
        'numeric' => '  :attributeيجب أن يكون أكبر من :value.',
        'file'    => '  :attribute يجب أن يكون أكبر من :value كيلو بايت.',
        'string'  => '  :attribute يجب أن يكون أكبر من :value حرف.',
        'array'   => '  :attribute يجب ان يكون اكثر من :value .',
    ],
    'gte'                  => [
        'numeric' => '  :attribute يجب أن يكون أكبر من or equal :value.',
        'file'    => '  :attribute يجب أن يكون أكبر من or equal :value kilobytes.',
        'string'  => '  :attribute يجب أن يكون أكبر من or equal :value characters.',
        'array'   => '  :attribute must have :value items or more.',
    ],
    'image'                => '  :attribute must be an image.',
    'in'                   => '  selected :attribute is invalid.',
    'in_array'             => '  :attribute field does not exist in :o r.',
    'integer'              => '  :attribute must be an integer.',
    'ip'                   => '  :attribute must be a valid IP address.',
    'ipv4'                 => '  :attribute must be a valid IPv4 address.',
    'ipv6'                 => '  :attribute must be a valid IPv6 address.',
    'json'                 => '  :attribute must be a valid JSON string.',
    'lt'                   => [
        'numeric' => '  :attribute must be less than :value.',
        'file'    => '  :attribute must be less than :value kilobytes.',
        'string'  => '  :attribute must be less than :value characters.',
        'array'   => '  :attribute must have less than :value items.',
    ],
    'lte'                  => [
        'numeric' => '  :attribute must be less than or equal :value.',
        'file'    => '  :attribute must be less than or equal :value kilobytes.',
        'string'  => '  :attribute must be less than or equal :value characters.',
        'array'   => '  :attribute must not have more than :value items.',
    ],
    'max'                  => [
        'numeric' => '  :attribute لا يجب ان يكون اكبر من :max.',
        'file'    => '  :attribute لا يجب ان يكون اكبر من :max kilobytes.',
        'string'  => '  :attribute لا يجب ان يكون اكبر من :max حرف.',
        'array'   => '  :attribute may not have more than :max items.',
    ],
    'mimes'                => '  :attribute must be a file of type: :values.',
    'mimetypes'            => '  :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => '  :attribute يجب ان يكون علي الاقل :min.',
        'file'    => '  :attribute يجب ان يكون علي الاقل :min كيلوبايت.',
        'string'  => '  :attribute يجب ان يكون علي الاقل :min عناصر.',
        'array'   => '  :attribute يجب ان يكون علي الاقل :min عناصر.',
    ],
    'not_in'               => '  selected :attribute is invalid.',
    'not_regex'            => '  :attribute التنسيق غير صالح.',
    'numeric'              => '  :attribute يجب أن يكون رقما .',
    'present'              => '  :attribute field must be present.',
    'regex'                => '  :attribute التنسيق غير صالح.',
    'required'             => 'حقل :attribute  مطلوب.',
    'required_if'          => '  :attribute field is required when :o r is :value.',
    'required_unless'      => '  :attribute field is required unless :o r is in :values.',
    'required_with'        => '  :attribute field is required when :values is present.',
    'required_with_all'    => '  :attribute field is required when :values is present.',
    'required_without'     => '  :attribute field is required when :values is not present.',
    'required_without_all' => '  :attribute field is required when none of :values are present.',
    'same'                 => '  :attribute و :o r must match.',
    'size'                 => [
        'numeric' => '  :attribute must be :size.',
        'file'    => '  :attribute must be :size kilobytes.',
        'string'  => '  :attribute must be :size characters.',
        'array'   => '  :attribute يجب ان يحتوي علي عناصر .',
    ],
    'string'               => '  :attribute must be a string.',
    'timezone'             => '  :attribute must be a valid zone.',
    'unique'               => ' :attribute  تم أخذه من قبل',
    'uploaded'             => '  :attribute failed to upload.',
    'url'                  => ' تنسيق :attribute غير صالح يجب ان يكون علي مثال http://www.website.com. ',

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    'attributes' => [
        "mobile"                => "رقم الموبايل",
        "password"              => "الباسورد",
        "name_ar"               => "الاسم بالعربي",
        "name_en"               => "الاسم بالانجليزية",
        "device_token"          => "التوكن",
        "name"                  => "الاسم",
        "email"                 => "الايميل",
        "user_name"             => "اسم المستخدم",
        "last_name"             => " الاسم الاخير",
        "first_name"            => " الاسم الاول ",
        "location"              => "الموقع",
        "country"               => "الدولة",
        "city"                  => "المدينة",
        "role"                  => "دور",
        "token"                 => "رقم الجهاز",
        'status'                => 'الحالة',
        'image'                 => 'الصورة',
        'type'                  => 'النوع',
        'disc_ar'               => 'الوصف بالعربي',
        'disc_en'               => 'الوصف بالانجليزية',
        'title'              => 'العنوان '  ,
        'title_ar'              =>  'العنوان بالعربية' ,
        'title_en'              =>  'العنوان بالانجليزية' ,
        'link'                  => 'الرابط الالكتروني' ,
        'amount'                => 'المبلغ' ,
        'period'                => 'الفترة' ,
        'day'                   => 'اليوم' ,
        'amount'                => 'المبلغ' ,
        'facebook'              => 'فيس بوك',
        'youtube'               => ' اليوتيوب',
        'instagram'             => ' انستقرام',
        'snapchat'              => ' سناب شات',
        'twitter'               => ' تويتر',
        'address'               => 'العنوان'  ,
        'from   '                  => 'وقت البدء' ,
        'to'                    => 'وقت الانتهاء' ,
        'available'             => 'متاح',
        'file'                  => 'الملف',
        'video'                 => 'الفيديو',
        'message'               => 'الرسائل',
        'job'                   => 'المهنة',
        'gender'                   => 'النوع',
        'birth_date'                   => 'تاريخ الميلاد',
        'country_id'  =>'الدولة',           
        'city_id'  =>'المدينة',           
        'area_id'  =>'المدينة',           
        'device_type'               => 'نوع الجهاز',
        'company_name'                    => 'اسم الشركة ',
        'category_id'                => 'الفئة  ',
        'lat'                 => '   الموقع ',
        'lng'                 => 'الموقع  ',
        'cost'                        => ' التكلفة', 
        'page'                        => ' الصفحة', 
        'total'                        => ' التكلفة الكلية', 
        'days'              => "عدد الأيام" ,
    ],
    

];
