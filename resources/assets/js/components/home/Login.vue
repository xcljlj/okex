<template>
    <el-container>
        <el-header>登录页面</el-header>
        <el-main>
            <el-form  type="flex" justify="center" :label-position="labelPosition" label-width="100px" :model="ruleForm" status-icon :rules="rules" ref="ruleForm"
                     class="demo-ruleForm" size="small">
                <el-form-item label="手机号码" prop="mobile">
                    <el-input v-model="ruleForm.mobile" autocomplete="off"></el-input>
                </el-form-item>
                <el-form-item label="短信验证码" prop="simCode">
                    <el-input v-model.number="ruleForm.simCode"></el-input>
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" @click="submitForm('ruleForm')">登录</el-button>
                    <el-button @click="resetForm('ruleForm')">重置</el-button>
                </el-form-item>
            </el-form>
        </el-main>
        <el-footer>区块链</el-footer>
    </el-container>
</template>

<script>
    export default {
        data() {
            var validateMobile = (rule, value, callback) => {
                if (value === '') {
                    callback(new Error('请输入手机号码'));
                } else {
                    if (this.ruleForm.simCode !== '') {
                        this.$refs.ruleForm.validateField('simCode');
                    }
                    callback();
                }
            };
            var validateSimCode = (rule, value, callback) => {
                if (value === '') {
                    callback(new Error('请输入短信验证码'));
                } else {
                    callback();
                }
            };
            return {
                labelPosition: 'right',
                ruleForm: {
                    mobile: '',
                    simCode: '',
                },
                rules: {
                    mobile: [
                        {
                            validator: validateMobile,
                            trigger: 'blur',
                        }
                    ],
                    simCode: [
                        {
                            validator: validateSimCode,
                            trigger: 'blur'
                        }
                    ],
                }
            };
        },
       async mounted(){
            var datas = await this.$http('/login',{
                mobile : 77777,
                simCode : 8888,

            })
            this.ruleForm.mobile = datas.name
            this.ruleForm.simCode = datas.simCode
        },
        methods: {
            submitForm(formName) {
                this.$refs[formName].validate((valid) => {
                    if (valid) {
                        this.$http('/login',{
                            mobile : this.ruleForm.mobile,
                            simCode : this.ruleForm.simCode,

                        })
                    } else {
                        console.log('error submit!!');
                        return false;
                    }
                });
            },
            resetForm(formName) {
                this.$refs[formName].resetFields();
            }
        }
    }
</script>

<style scoped>
    .el-header, .el-footer{
        background-color: #B3C0D1;
        color: #333;
        text-align: center;
        line-height: 60px;
    }


    .el-main {
        background-color: #E9EEF3;
        color: #333;
        text-align: center;
        line-height: 160px;
    }
</style>