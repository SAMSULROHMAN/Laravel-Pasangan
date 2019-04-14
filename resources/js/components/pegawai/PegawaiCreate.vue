<template>
    <div>
        <h4 class="mt-2">Tambah Pegawai</h4>
        <hr>

        <form method="post" v-on:submit.prevent="Simpan">

            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-4">
                    <input type="text" id="nama" class="form-control" v-model="pegawai.nama_pegawai">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-4">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="jkl" v-model="pegawai.jenis_kelamin" value="L" class="custom-control-input">
                        <label for="jkl" class="custom-control-label">Laki Laki</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="jkp" v-model="pegawai.jenis_kelamin" value="P" class="custom-control-input">
                        <label for="jkp" class="custom-control-label">Perempuan</label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-3">
                    <input type="date" id="tanggal" v-model="pegawai.tgl_lahir" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                <div class="col-sm-4">
                    <select id="jabatan" class="custom-select" v-model="pegawai.id_jabatan">
                        <option value=""> --Pilih Jabatan -- </option>
                        <option v-for="data in jabatan" v-bind:key="data" v-bind:value="data.id_jabatan">
                            {{ data.nama_jabatan }}
                        </option>
                    </select>
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
            pegawai:{},
            jabatan:{}
        }
    },
    mounted(){
        this.tampil();
    },
    methods: {
        tampil(){
            let uri = '/pegawai/create';
            this.axios.get(uri).then((response) => {
                this.jabatan = response.data;
            })
        },

        Simpan(){
            let uri = '/pegawai';
            let formData = new FormData();

            formData.append('nama_pegawai',this.pegawai.nama_pegawai);
            formData.append('jenis_kelamin',this.pegawai.jenis_kelamin);
            formData.append('tgl_lahir', this.pegawai.tgl_lahir);
            formData.append('id_jabatan', this.pegawai.id_jabatan);

            let config = {
                headers: {
                    'Content-Type':'multipart/form-data'
                }
            }

            this.axios.post(uri, formData, config).then((response) => {
                this.$router.push({name:'pegawai'})
            })
            }
        }
    }
</script>

<style>

</style>
