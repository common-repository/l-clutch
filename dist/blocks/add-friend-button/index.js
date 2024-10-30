(()=>{"use strict";var e,t={762:()=>{const e=window.React,t=window.wp.blocks,l=window.wp.element,a=(0,l.forwardRef)((function({icon:e,size:t=24,...a},i){return(0,l.cloneElement)(e,{width:t,height:t,...a,ref:i})})),i=window.wp.primitives,r=(0,e.createElement)(i.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24"},(0,e.createElement)(i.Path,{d:"M15.5 9.5a1 1 0 100-2 1 1 0 000 2zm0 1.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5zm-2.25 6v-2a2.75 2.75 0 00-2.75-2.75h-4A2.75 2.75 0 003.75 15v2h1.5v-2c0-.69.56-1.25 1.25-1.25h4c.69 0 1.25.56 1.25 1.25v2h1.5zm7-2v2h-1.5v-2c0-.69-.56-1.25-1.25-1.25H15v-1.5h2.5A2.75 2.75 0 0120.25 15zM9.5 8.5a1 1 0 11-2 0 1 1 0 012 0zm1.5 0a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z",fillRule:"evenodd"})),n=window.wp.blockEditor,o=window.wp.components,s=window.lClutch.blockEditor,c=["image"],m=JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":3,"name":"l-clutch/add-friend-button","version":"0.1.0","title":"友だち追加ボタン","category":"l-clutch","description":"友だち追加ボタンです。友だちに追加済みの場合は、表示されません。","attributes":{"basicId":{"type":"string"},"text":{"type":"string","default":"友だち追加","source":"html","selector":"span"},"imageId":{"type":"number"},"imageUrl":{"type":"string","source":"attribute","selector":"img","attribute":"src"},"imageAlt":{"type":"string","source":"attribute","selector":"img","attribute":"alt"},"imageWidth":{"type":"string"}},"supports":{"align":["wide","full"],"shadow":true,"spacing":{"margin":["top","bottom"]},"layout":{"allowOrientation":false,"allowVerticalAlignment":false,"allowSwitching":false,"allowInheriting":false,"default":{"type":"flex","justifyContent":"center"}},"typography":{"fontSize":true}},"example":{"attributes":{"text":"友だち追加"}},"textdomain":"l-clutch","editorScript":"file:./index.js","editorStyle":["l-clutch-block-editor"],"style":"file:./style-index.css","render":"file:./render.php"}'),u=[{attributes:{loginUrl:{type:"string",source:"attribute",selector:"a",attribute:"href"},text:{type:"string",default:"友だち追加",source:"html",selector:"span"},imageId:{type:"number"},imageUrl:{type:"string",source:"attribute",selector:"img",attribute:"src"},imageAlt:{type:"string",source:"attribute",selector:"img",attribute:"alt"},imageWidth:{type:"string"},fontSizeStyle:{type:"string"}},supports:{align:["wide","full"],shadow:!0,spacing:{margin:["top","bottom"]},layout:{allowOrientation:!1,allowVerticalAlignment:!1,allowSwitching:!1,allowInheriting:!1,default:{type:"flex",justifyContent:"center"}},typography:{fontSize:!0}},save:function({attributes:t}){var l,a;const i=t.imageUrl?(0,e.createElement)("img",{src:t.imageUrl,alt:t.imageAlt,className:"image",style:{width:t.imageWidth}}):(0,e.createElement)(n.RichText.Content,{tagName:"span",value:t.text,className:"text"}),r=n.useBlockProps.save({className:`is-content-justification-${null===(l=null==t?void 0:t.layout)||void 0===l?void 0:l.justifyContent}`});return(0,e.createElement)("div",{...r,style:{...r.style,fontSize:void 0,"--font-size":null!==(a=t.fontSizeStyle)&&void 0!==a?a:"1rem"}},(0,e.createElement)("a",{href:"#addFriendUrl",target:"_blank",rel:"noopener noreferrer",className:t.imageUrl?"image-button":"text-button"},i))}}];(0,t.registerBlockType)(m,{icon:(0,e.createElement)(a,{icon:r,className:"l-clutch-block-icon"}),edit:function({attributes:t,setAttributes:l}){var a,i;return(0,e.createElement)("div",{...(0,n.useBlockProps)({className:`is-content-justification-${null!==(i=null===(a=null==t?void 0:t.layout)||void 0===a?void 0:a.justifyContent)&&void 0!==i?i:"center"}`})},(0,e.createElement)(n.BlockControls,{group:"other"},t.imageUrl?(0,e.createElement)(e.Fragment,null,(0,e.createElement)(n.MediaReplaceFlow,{mediaId:t.imageId,mediaURL:t.imageUrl,allowedTypes:c,accept:"image/*",onSelect:e=>l({...t,imageId:e.id,imageUrl:e.url,imageAlt:e.alt}),onSelectURL:e=>{l({...t,imageUrl:e})},onError:()=>{}}),(0,e.createElement)(o.Button,{onClick:()=>l({...t,imageId:null,imageUrl:null,imageAlt:null})},"画像を削除")):(0,e.createElement)(e.Fragment,null,(0,e.createElement)(n.MediaUploadCheck,null,(0,e.createElement)(n.MediaUpload,{onSelect:e=>l({...t,imageId:e.id,imageUrl:e.url,imageAlt:e.alt}),allowedTypes:c,value:t.imageId,render:({open:t})=>(0,e.createElement)(o.Button,{onClick:t},"画像を選択")})),(0,e.createElement)(s.URLSelectionUI,{onChange:e=>l({...t,imageUrl:e})}))),t.imageUrl&&(0,e.createElement)(n.InspectorControls,null,(0,e.createElement)(o.PanelBody,{title:"サイズ",initialOpen:!0},(0,e.createElement)(o.PanelRow,null,(0,e.createElement)(s.UnitControl,{label:"画像の幅",onChange:e=>l({...t,imageWidth:e}),value:t.imageWidth})))),(0,e.createElement)("a",{href:"#addFriendUrl",className:t.imageUrl?"image-button":"text-button",style:{cursor:"inherit"}},t.imageUrl?(0,e.createElement)("img",{src:t.imageUrl,alt:t.imageAlt,className:"image",style:{width:t.imageWidth}}):(0,e.createElement)(n.RichText,{onChange:e=>{e=e.replace(/(\r?\n)|(<br\/?>)/g," "),l({...t,text:e})},value:t.text,withoutInteractiveFormatting:!0,className:"text",identifier:"text"})))},save:function({attributes:t}){const l=t.imageUrl?(0,e.createElement)("img",{src:t.imageUrl,alt:t.imageAlt,className:"image",style:{width:t.imageWidth}}):(0,e.createElement)(n.RichText.Content,{tagName:"span",value:t.text,className:"text"});return(0,e.createElement)("div",{...n.useBlockProps.save()},(0,e.createElement)("a",{href:"#addFriendUrl",target:"_blank",rel:"noopener noreferrer",className:t.imageUrl?"image-button":"text-button"},l))},deprecated:u})}},l={};function a(e){var i=l[e];if(void 0!==i)return i.exports;var r=l[e]={exports:{}};return t[e](r,r.exports,a),r.exports}a.m=t,e=[],a.O=(t,l,i,r)=>{if(!l){var n=1/0;for(m=0;m<e.length;m++){for(var[l,i,r]=e[m],o=!0,s=0;s<l.length;s++)(!1&r||n>=r)&&Object.keys(a.O).every((e=>a.O[e](l[s])))?l.splice(s--,1):(o=!1,r<n&&(n=r));if(o){e.splice(m--,1);var c=i();void 0!==c&&(t=c)}}return t}r=r||0;for(var m=e.length;m>0&&e[m-1][2]>r;m--)e[m]=e[m-1];e[m]=[l,i,r]},a.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),(()=>{var e={120:0,24:0};a.O.j=t=>0===e[t];var t=(t,l)=>{var i,r,[n,o,s]=l,c=0;if(n.some((t=>0!==e[t]))){for(i in o)a.o(o,i)&&(a.m[i]=o[i]);if(s)var m=s(a)}for(t&&t(l);c<n.length;c++)r=n[c],a.o(e,r)&&e[r]&&e[r][0](),e[r]=0;return a.O(m)},l=globalThis.webpackChunk_l_clutch_scripts=globalThis.webpackChunk_l_clutch_scripts||[];l.forEach(t.bind(null,0)),l.push=t.bind(null,l.push.bind(l))})();var i=a.O(void 0,[24],(()=>a(762)));i=a.O(i)})();