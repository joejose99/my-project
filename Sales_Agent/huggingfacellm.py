# libraries and Modules
from langchain.chains import RetrievalQA
# from langchain.document_loaders import UnstructuredFileLoader
from langchain_community.document_loaders import TextLoader
# from langchain.embeddings import HuggingFaceEmbeddings
from langchain_community.embeddings import HuggingFaceEmbeddings
# from langchain.text_splitter import CharacterTextSplitter
from langchain_text_splitters import CharacterTextSplitter
# from langchain.vectorstores import Chroma
from langchain_community.vectorstores import Chroma
# from langchain import HuggingFacePipeline
from langchain_community.llms.huggingface_pipeline import HuggingFacePipeline

#Document Loader and Splitter 
# loader = UnstructuredFileLoader("./Test.txt")
loader = TextLoader("webpages_text.txt")
documents = loader.load()
text_splitter = CharacterTextSplitter(chunk_size=1000, chunk_overlap=0)
texts = text_splitter.split_documents(documents)

llm = HuggingFacePipeline.from_model_id(model_id="google/flan-t5-base", task="text2text-generation", pipeline_kwargs={"max_length":1000})
# Embeddings and Vectorstores
directory='db'
embeddings = HuggingFaceEmbeddings()
docsearch = Chroma(persist_directory=directory, embedding_function=embeddings)

#Chain
qa = RetrievalQA.from_chain_type(llm=llm, chain_type="stuff", retriever=docsearch.as_retriever())

# Prompt
query = "Tell us about us, focus and vision?"
# response = qa.run(query)
response = qa.invoke(query)
# print(response)
print(response['result'])