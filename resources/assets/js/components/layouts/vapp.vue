<template>
    <van-row>
        <van-tabbar v-model="active">
            <van-tabbar-item icon="wap-home">首页</van-tabbar-item>
            <van-tabbar-item icon="photo" dot>行情</van-tabbar-item>
            <van-tabbar-item icon="gold-coin" info="5">交易</van-tabbar-item>
            <van-tabbar-item icon="contact" info="20" url="http://www.qkl.com/#/login">我的</van-tabbar-item>
        </van-tabbar>
    </van-row>
</template>

<script>
    export default {
        data(){
            return {
                active : 0
            }

        },
        name: "app"
    }
</script>

<style scoped>

</style>