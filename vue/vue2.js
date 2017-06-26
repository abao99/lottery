var app = new Vue({
  el: '#app',
  data: {
    fruit: [
      {text:'banana', done:true},
      {text:'apple', done:false}],
    newInput : ''
  },
  computed: {
    remaining() {  //�p�� false �ƶq
      var count = 0;
      for(var key in this.fruit) {
        if(this.fruit[key].done == false)
          count++;
      }
      return count;
    }
  },
  methods: {
    addFruit() {  //�s�W
      this.fruit.push({ text:this.newInput, done:false });
      this.newInput = "";
    },
    removeFruit() {  //�R��
      var newFruit = [];
      for(var key in this.fruit) {
        if(this.fruit[key].done == false)
          newFruit.push({ text:this.fruit[key].text , done:false });
      }
      this.fruit = newFruit;
    }
  }
  
  
})
