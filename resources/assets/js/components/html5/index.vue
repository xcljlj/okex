<template>
    <van-row>
        <van-nav-bar
                title="首页"
                left-text="返回"
                right-text="..."
                left-arrow
                @click-left=""
                @click-right=""
        />
        <van-swipe :autoplay="3000">
            <van-swipe-item v-for="(image, index) in images" :key="index">
                <img v-lazy="image" />
            </van-swipe-item>
        </van-swipe>
        <van-notice-bar
                mode = "link"
                :speed='100'
                text="区块链交易所312312rwerwerwerfsfsdfsdfsdfsdfsdfsdfsdffsdf"
                left-icon="/img/icon/6af5b7168eed548100d9041f07b7c616.png"
        />
    </van-row>
</template>

<script>
    export default {
        data() {
            return {
                active: 0,
                images: [
                    '/img/banner/3bd347e44233a868c99cf0fe560232be.jpg',
                    '/img/banner/4e3ea0898b1c2c416eec8c11c5360833.jpg',
                    '/img/banner/c0dab461920687911536621b345a0bc9.jpg',
                    '/img/banner/fd08f07665ed67d50e11b32a21ce0682.jpg',
                ]
            }
        }
    }
</script>

<style scoped>
    .van-swipe .van-swipe-item img{
        height: 180px;
        width: 100%;
    }
</style>