	//����ajax����
	function getXmlHttpObject(){
		
		var xmlHttpRequest;
		//��ͬ���������ȡxmlhttprequest����ķ�����һ��
		if(window.ActiveXObject){
			xmlHttpRequest=new ActiveXObject("Microsoft.XMLHTTP");
		}else{
			xmlHttpRequest=new XMLHttpRequest();
		}
		return xmlHttpRequest;
	}
	
	//��������дһ������
	function $(id){
		
		return document.getElementById(id);
	}