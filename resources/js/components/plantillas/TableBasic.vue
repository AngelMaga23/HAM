<template>
            <div class="content-panel">
              <h4>  
	      <slot name="title">
	      </slot>
	      </h4>
              <section id="unseen">

      <table class="table">
	  <thead>
	      <tr>
		  <slot name="thead">
		  </slot>
	      </tr>
	  </thead>
	  <tbody>
		  <slot name="tbody">
		  </slot>
	  </tbody>
      </table>
              </section>
            </div> 
</template>
