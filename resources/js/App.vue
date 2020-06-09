<template>
  <div id="app">
    <example :form="form" v-model="form" class="properties-form" @submited="newSearch" @cleared="clear"></example>

    <div class="pages" v-show="page && pages && !loading">
      Page {{ page }} of {{ pages }}
    </div>

    <div class="pages" v-show="notfound">
      No results were found
    </div>

    

    <el-table stripe class="table" v-loading="loading" v-show="tableData" :data="tableData" :empty-text="emptyText" border>
      <el-table-column prop="name" label="Name" width="200"></el-table-column>
      <el-table-column prop="bedrooms" label="Bedrooms"  align="right"></el-table-column>
      <el-table-column prop="bathrooms" label="Bathrooms" align="right"></el-table-column>
      <el-table-column prop="storeys" label="Storeys" align="right"></el-table-column>
      <el-table-column prop="garages" label="Garages" align="right"></el-table-column>
      <el-table-column prop="price" label="Price" align="right"></el-table-column>
    </el-table>

    <el-pagination
      hide-on-single-page
      class="paginator"
      layout="prev, pager, next"
      :total="total"
      :disabled="loading"
      :current-page="page"
      @current-change="pageChange"
    ></el-pagination>
  </div>
</template>
<script>
import Example from "./components/PropertiesForm";
import Qs from "qs";

export default {
  name: "app",
  data() {
    return {
      loading: false,
      tableData: [],
      total: 0,
      page: 0,
      pages: 0,
      emptyText: 'Apply filters and press the Search button',
      notfound: false,

      form: {
        partial_name: "",
        bedrooms: "",
        bathrooms: "",
        storeys: "",
        garages: "",
        min_price: 100000,
        max_price: 1000000
      }
    };
  },
  methods: {
    pageChange(a) {
      this.page = a
      this.search()
    },
    newSearch(a) {
      this.page = 1
      this.search()
    },
    search() {
      this.loading = true;
      axios
        .get("http://127.0.0.1:8000/api", {
          params: {
            filter: this.form,
            page: this.page
          },
          paramsSerializer: function(params) {
            return Qs.stringify(params, { arrayFormat: "brackets" })
          }
        })
        .then(response => {
          this.notfound = response.data.total ? false : true
          this.pages = response.data.total ? response.data.last_page : 0
          this.total = response.data.total
          this.tableData = response.data.data
          this.loading = false
        });
    },
    clear(a) { 
      this.form = {
        partial_name: "",
        bedrooms: "",
        bathrooms: "",
        storeys: "",
        garages: "",
        min_price: 100000,
        max_price: 1000000
      }
      this.tableData = []
      this.total = 0
      this.page = 0
      this.pages = 0
      this.notfound = false
    }
  },
  
  components: {
    Example
  }
};
</script>
<style scoped>
/* Add scoped styles */
#app {
  padding: 20px;
  max-width: 800px;
  margin: 0 auto;
}
.table {
  width: 100%;
  max-width: 800px;
  margin: 0 auto;
}

.properties-form {
  max-width: 550px;
  margin: 0 auto 5rem auto;
}

.paginator {
  margin: 1rem auto;
  text-align: center;
}

.pages {
  margin-bottom: 2rem;
  text-align: center;
  color: darkgray;
  font-size: 0.8rem;
}
</style>