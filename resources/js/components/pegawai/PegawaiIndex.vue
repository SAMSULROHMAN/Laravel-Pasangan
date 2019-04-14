<template>
    <div>
        <h4 class="mt-2">Data Pegawai</h4>
        <hr>
        <router-link class="btn btn-success text-white" :to="{name:'pegawaitambah'}">
            <i class="oi oi-plus"></i>Tambah
        </router-link>

        <div class="table-responsive mt-3">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(data,index) in pegawai">
                        <td>{{ index + 1 }}</td>
                        <td>{{ data.nama_pegawai }}</td>
                        <td>{{ data.jenis_kelamin }}</td>
                        <td>{{ data.tgl_lahir }}</td>
                        <td>{{ data.nama_jabatan }}</td>
                        <td>
                            <router-link class="btn btn-sm btn-info" :to="{name:'pegawaiedit',params: { id: data.id_pegawai }}">
                                <i class="oi oi-pencil"></i>Edit
                            </router-link>
                            <button class="btn btn-sm btn-danger" @click="hapus(index, data.id_pegawai)">
                                <i class="oi oi-trash"></i>Hapus
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            pegawai:[]
        }
    },
    mounted(){
        this.tampil();
    },
    methods:{
        tampil(){
            let uri = '/pegawai/data';
            this.axios.get(uri).then((response) => {
                console.log(response.data);
                this.pegawai = response.data;
            });
        },
        hapus(index, id) {
            let uri = '/pegawai/' + id;
            if(confirm("Apakah anda yakin akan dihapus?")){
                this.axios.delete(uri).then((response) => {
                    this.pegawai.splice(index, 1);
                })
            }
        }
    }
}
</script>

<style>

</style>
