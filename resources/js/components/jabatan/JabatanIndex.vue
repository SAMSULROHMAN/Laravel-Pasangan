<template>
    <div>
        <h4 class="mt-2">Data Jabatan</h4>
        <hr>
        <router-link class="btn btn-success text-white" :to="{name:'jabatantambah'}">
            <i class="oi oi-plus"></i>Tambah
        </router-link>
        <div class="table-responsive mt-3">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(data,index) in jabatan" :key="index">
                        <td>{{ index+1 }}</td>
                        <td>{{ data.nama_jabatan }}</td>
                        <td>
                            <router-link class="btn btn-sm btn-info" :to="{ name:'jabatanedit', params:{id:data.id_jabatan}}">
                                <i class="oi oi-pencil"></i>Edit
                            </router-link>
                            <button class="btn btn-sm btn-danger" @click="hapus(index, data.id_jabatan)">
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
  data() {
    return {
      jabatan: []
    }
  },
  mounted() {
    this.tampil();
  },

  methods: {
    tampil() {
      let uri = "jabatan/data";
      this.axios.get(uri).then(response => {
        this.jabatan = response.data;
      });
    },

    hapus(index, id) {
      let uri = '/jabatan/' + id;
      if (confirm("Apakah yakin akan dihapus?")) {
        this.axios.delete(uri).then ((response) => {
          this.jabatan.splice(index, 1);
        });
      }
    }
  }
}
</script>

<style>
</style>
