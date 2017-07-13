/*
* 服务器地址,成功返回,失败返回参数格式依照jquery.ajax习惯;
* 其他参数同WebUploader
*/
$('#test').diyUpload({
    url:'http://www.haitouwanhu.com/Image/filed',
    success:function( data ) {
        console.info( data );
    },
    error:function( err ) {
        console.info( err );  
    }
});