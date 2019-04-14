<template>
    <div>
        <h4 class="mt-2">Tambah Jabatan</h4>
        <hr>

        <form method="post" v-on:submit.prevent="simpan">
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Jabatan</label>
                <div class="col-sm-4">
                    <input type="text" id="nama" class="form-control" v-model="jabatan.nama_jabatan">
                </div>
            </div>
            
            <button class="btn btn-info" type="submit">
                <i class="oi oi-task"></i>Simpan
            </button>
            <button type="reset" class="btn btn-warning">
                <i class="oi oi-circle-x"></i>Batal
            </button>
        </form>
    </div>
</template>

<script>
export default {
    data(){
        return{
            jabatan:{}
        }
    },
    methods:{
        simpan(){
            let uri = '/jabatan';
            this.axios.post(uri, this.jabatan).then((response) => {
                this.$router.push({name:'jabatan'})
            });
        }
    }
}
</script>

<style>

</style>
