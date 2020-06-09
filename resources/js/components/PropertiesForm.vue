<template>
  <div>
    <el-form ref="form" :model="form" label-position="left" label-width="90px">
      <el-form-item label="Name">
        <el-input v-model="form.partial_name" @keyup.enter.native="onSubmit"></el-input>
      </el-form-item>

      <el-row>
        <el-col :span="11">
          <el-form-item  label="Bedrooms">
            <el-select v-model="form.bedrooms" placeholder="Any">
              <el-option label="Any" value></el-option>
              <el-option label="1" value="1"></el-option>
              <el-option label="2" value="2"></el-option>
              <el-option label="3" value="3"></el-option>
              <el-option label="4" value="4"></el-option>
              <el-option label="5" value="5"></el-option>
            </el-select>
          </el-form-item>
        </el-col>
        <el-col :span="2">&nbsp;</el-col>
        <el-col :span="11">
          <el-form-item label-position="top" label="Bathrooms">
            <el-select v-model="form.bathrooms" placeholder="Any">
              <el-option label="Any" value></el-option>
              <el-option label="1" value="1"></el-option>
              <el-option label="2" value="2"></el-option>
              <el-option label="3" value="3"></el-option>
            </el-select>
          </el-form-item>
        </el-col>
      </el-row>

      <el-row>
        <el-col :span="11">
          <el-form-item label="Storeys">
            <el-select v-model="form.storeys" placeholder="Any">
              <el-option label="Any" value></el-option>
              <el-option label="None" value="none"></el-option>
              <el-option label="1" value="1"></el-option>
              <el-option label="2" value="2"></el-option>
            </el-select>
          </el-form-item>
        </el-col>
        <el-col :span="2">&nbsp;</el-col>
        <el-col :span="11">
          <el-form-item label="Garages">
            <el-select v-model="form.garages" placeholder="Any">
              <el-option label="Any" value></el-option>
              <el-option label="None" value="none"></el-option>
              <el-option label="1" value="1"></el-option>
              <el-option label="2" value="2"></el-option>
            </el-select>
          </el-form-item>
        </el-col>
      </el-row>

      <el-form-item label="Price">
        <el-slider v-model="price" :step="100000" range show-stops :max="max_price" :min="min_price"></el-slider>
      </el-form-item>

      <el-form-item>
        <el-button type="primary" @click="onSubmit">Search</el-button>
        <el-button @click="onClear">Clear</el-button>
      </el-form-item>
    </el-form>
  </div>
</template>

<script>
export default {
  props: ['form'],
  data() {
    return {
      price: [],
      min_price: 0,
      max_price: 0,
    };
  },
  methods: {
    onSubmit() {
      this.$emit('submited', this.form)
    },
    onClear() {
      this.$emit('cleared')
    }

  },
  mounted() {
    this.price = [
      this.form.min_price,
      this.form.max_price
    ]
    this.min_price = this.form.min_price
    this.max_price = this.form.max_price
  },
  watch: {
    price: function(val) {
      this.form.min_price = val[0]
      this.form.max_price = val[1]
    }
  }
};
</script>
<style scoped>

</style>